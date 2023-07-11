<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request )
    {
        
        $carts = [];
        if(Session::has('carts')){
            $carts = Session::get('carts');
        }
        // dd($carts);
        return view('frontend.account.product.Cart',compact('carts'));
    }

    public function upDownQty(Request $request)
    {
        if(Session::has('carts')) {
            $carts = Session::get('carts');
            if(array_key_exists($request->id_product, $carts)) {
                if($request->qty <= 0) {
                    unset($carts[$request->id_product]);
                } else {
                    $carts[$request->id_product]['qty'] = $request->qty;
                }
                Session::put('carts', $carts);
            }
        }

        $carts = Session::get('carts');
        $sumtotal = 0;
        foreach($carts as $cart){
            $total = $cart['price'] * $cart['qty'] ;
            $sumtotal = $sumtotal + $total;
        }
        return response()->json(['message' => 'Sucess', 'sumtotal' => $sumtotal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Session::has('carts')) {
            $carts = Session::get('carts');
            unset($carts[$id]);
            Session::put('carts', $carts);
            return redirect()->back()->with('success','delete success');
         }
    }
}