<?php
 
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Product;
use Session;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $Products = Product::paginate(3);
        $dataProduct =Product::where('id_product',$id)->get();
        // dd($dataProduct);
        return view('frontend.account.product.ProductDetail',compact('dataProduct','Products'));
    }

    public function addToCart(Request $request) {
        $product = Product::where('id_product', $request->id_product)->first();
        $carts = Session::get('carts');
        $total = 0;
        $total = $request->qty *  $product->price;
        $data = [
            'qty' => $request->qty,
            'image' => $product->image,
            'title' => $product->title,
            'price' => $product->price,
            'total' => $total,
        ];

        // Session::forget('carts');

        if(Session::has('carts')) {
            if(array_key_exists($request->id_product, $carts)) {
                $carts[$request->id_product]['qty'] += $request->qty;
                Session::put('carts', $carts);
            }else{
                $carts[$product->id_product] = $data;
                Session::put('carts', $carts);
            }
        } else {
            $cart[$product->id_product] = $data;
            Session::put('carts', $cart);
        }

        $carts = Session::get('carts');
        $sumQty = 0;
        foreach($carts as $cart){
            $sumQty+= $cart['qty'];
        }
        return response()->json(['message' => 'Sucess','sumQty' => $sumQty]);
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
        //
    }
}
