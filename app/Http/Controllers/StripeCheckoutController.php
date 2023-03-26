<?php

namespace App\Http\Controllers;

use App\ObituaryPayments;
use App\Obituaries;
use App\Payments;
use App\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe\Exception\CardException;
use Stripe\Exception\InvalidRequestException;
use Stripe\Exception\AuthenticationException;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\ApiErrorException;
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
                $site =   SiteSettings::whereNotNull('id')->first();
                Stripe\Stripe::setApiKey($site->stripe_secret);
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
                    foreach ($items as $uid=>$donar_amount){
                        $service_charges_amount =   ($site->service_charges/100)*$donar_amount;
                        $amount                 =   $donar_amount-$service_charges_amount;
                        $obituary               =   Obituaries::where('uid',$uid)->first();
                        ObituaryPayments::insertGetId([
                            'user_id'               =>  Auth::user()->id,
                            'payment_id'            =>  $payment_id,
                            'obituary_id'           =>  $obituary->id,
                            'donar_amount'          =>  $donar_amount,
                            'service_charges'       =>  $site->service_charges,
                            'service_charges_amount'=>  $service_charges_amount,
                            'amount'                =>  $amount,
                            'status'                =>  'in',
                            'currency'              =>  $data['currency'],
                            'created_at'            =>  date("Y-m-d H:i:s"),
                        ]);
                        $obituary->total_donation   =   $obituary->total_donation+$amount;
                        $obituary->save();
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
        catch (CardException $e) {
            // Handle card errors
            $error_message = $e->getError()->message;

            Session::flash('error', $error_message);
            return back();

        } catch (InvalidRequestException $e) {
            // Handle invalid request errors
            $error_message = $e->getError()->message;

            Session::flash('error', $error_message);
            return back();

        } catch (AuthenticationException $e) {
            // Handle authentication errors
            $error_message = $e->getError()->message;

            Session::flash('error', $error_message);
            return back();

        } catch (ApiConnectionException $e) {
            // Handle API connection errors
            $error_message = $e->getError()->message;

            Session::flash('error', $error_message);
            return back();

        } catch (ApiErrorException $e) {
            // Handle API errors
            $error_message = $e->getError()->message;
            Session::flash('error', $error_message);
            return back();

        }
        catch(Exception $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
        return back();

    }
}