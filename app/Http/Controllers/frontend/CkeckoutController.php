<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Mail\MailCheckoutRegister;
use Mail;

class CkeckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = [];
        if(Session::has('carts')){
            $carts = Session::get('carts');
        }
        // dd($carts);
        return view('frontend.account.product.Checkout',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function upDownQty(Request $request)
    {
         if(Session::has('carts')){
            $carts = Session::get('carts');
            if(array_key_exists($request->id_product,$carts)){
                if($request->qty < 1) {
                    unset($carts[$request->id_product]);
                } else {
                    $carts[$request->id_product]['qty'] = $request->qty;
                }
                Session::put('carts',$carts);   
            }
        }
    
    
        if(Session::has('carts')){
            $carts = Session::get('carts');
            $sumtotal = 0;
            foreach($carts as $cart){
                $total = $cart['price'] * $cart['qty'];
                $sumtotal = $sumtotal + $total;
            }
        }
        return response()->json(['message' => 'Sucess', 'sumtotal' => $sumtotal]);
    }
    


    public function insert(Request $request)
    {
        $dataRegister = new User();
        $dataRegister->level=0;
        $dataRegister->name=$request->name;
        $dataRegister->email=$request->email;
        $dataRegister->password=$request->password;
        if($dataRegister->save()) {
            $data = [
                'body'=>'bạn đã đăng kí thành công',
                'subject'=>'thông tin từ shop',
            ];
            try{
                Mail::to('nhoa04112k1@gmail.com')->send(new MailCheckoutRegister($data));
                return response()->json(['create'=>'great check your mail box']);
            }catch (Exception $th){
                return response()->json(['sorry']);
            }
        }else{
            return redirect()->route('checkout')->withErrors('create profile error');
        }
            
            return redirect()->route('checkout')->with('success',('create profile success'));
            
        }
    }

    /**
     * Store a newly created resource in storage.
     */
   

