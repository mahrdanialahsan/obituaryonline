<?php

namespace App\Http\Controllers;

use App\Campaigns;
use Illuminate\Http\Request;
use Session;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart               =   [];
        $donations          =   [];
        if(Session::has('cart_items')){
            $cart           =   Session::get('cart_items');
            $donations      =   Campaigns::whereIn('uid',array_keys($cart))->get();
        }
        return view('donate.form',compact('donations','cart'));
    }


    public function getCart($status = 0)
    {
        //
        $cart               =   [];
        $donations          =   [];
        if(Session::has('cart_items')){
            $cart           =   Session::get('cart_items');
            $donations      =   Campaigns::whereIn('uid',array_keys($cart))->get();
        }
        $data   =    [
                        'cart'       => $cart,
                        'donations'  => $donations,
                        'ttl_amount' => (float)@array_sum(@array_values($cart))
                    ];
        if($status == 1){
            return $data;
        }else{
            return response()->json([
                'status' => 'success',
                'data'   => $data
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$uid,$amount)
    {
        //
        $cart   =   [];
        if(Session::has('cart_items')){
            $cart           =   Session::get('cart_items');
            $cart[$uid]     =   $amount ? (float)$amount:0;
        }
        Session::put('cart_items',$cart);
        return response()->json([
            'status' =>     'success',
            'msg'    => '   Item added to cart.',
            'amount' =>     array_sum(array_values(Session::get('cart_items'))),
            'count'  =>     @count(Session::get('cart_items')),
            'data'   => $this->getCart(1)

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid='')
    {
        //
        if(Session::has('cart_items')){
            $cart       =   Session::get('cart_items');
            if(empty($uid)){
                $cart   =   [] ;
            }else{
                //dd($cart[$uid]);
                unset($cart[$uid]);
            }
            Session::put('cart_items',$cart);
        }
        return response()->json([
            'status' => 'success',
            'data'   => $this->getCart(1)
        ]);
    }

    public function checkout(){
        return view('checkout');
    }
}
