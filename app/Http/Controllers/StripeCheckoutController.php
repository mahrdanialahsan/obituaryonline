<?php

namespace App\Http\Controllers;

use App\CampaignPayments;
use App\Campaigns;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
//https://medium.com/@laraveltuts/laravel-9-stripe-payment-gateway-integration-example-79b17969b6eb
class StripeCheckoutController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $cart_items  =   Session::get('cart_items');
        $amount      =   (float)array_sum(array_values($cart_items));
        try {
            if ($amount) {
                $metadata   =   [
                    'user_id'    => Auth::user()->id,
                    'cart_items' => json_encode($cart_items),
                ];
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET', 'sk_test_VgQx6sXcjkb19a2xCjI3Bz2J00Jy8xVuGN'));
                $response = Stripe\Charge::create([
                                                "amount"        =>  round($amount, 2) * 100,
                                                "currency"      =>  "usd",
                                                "source"        =>  $request->stripeToken,
                                                "description"   =>  "Obituary Online payment",
                                                "metadata"      =>  $metadata
                                            ]);
                //dd(collect($response)->toArray());
                $data = collect($response)->toArray();
                if($data['status'] == 'succeeded'){
                 $payment_id    =   Payments::insertGetId([
                                                            'user_id'          =>  Auth::user()->id,
                                                            'transaction_id'   =>  $data['id'],
                                                            'amount'           =>  $data['amount']/100,
                                                            'currency'         =>  $data['currency'],
                                                            'receipt_url'      =>  $data['receipt_url'],
                                                            'created'          =>  date("Y-m-d H:i:s", $data['created']),
                                                            'status'           =>  $data['status'],
                                                            'metadata'         =>  json_encode($data['metadata']),
                                                            'created_at'       =>  date("Y-m-d H:i:s"),
                                                        ]);


                    $items   =   json_decode($data['metadata']['cart_items'],true);
                    foreach ($items as $uid=>$amount){
                        $campaign   =   Campaigns::where('uid',$uid)->first();
                        CampaignPayments::insertGetId([
                            'user_id'          =>  Auth::user()->id,
                            'payment_id'   =>  $payment_id,
                            'campaign_id'  =>  $campaign->id,
                            'amount'       =>  $amount,
                            'currency'     =>  $data['currency'],
                            'created_at'   =>  date("Y-m-d H:i:s"),
                        ]);
                        $campaign->total_donation   =   $campaign->total_donation+$amount;
                        $campaign->save();
                    }
                    Session::put('cart_items', []);
                    Session::flash('success', 'Payment successfully paid.!');
                    return redirect(route('cart'));
                }
                else{
                    Session::flash('error', 'Payment failed!');
                    return back();
                }
            } else {
                Session::flash('error', 'Invalid payment amount!');
                return back();
            }
        }
        catch(Exception $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
        return back();

    }
}