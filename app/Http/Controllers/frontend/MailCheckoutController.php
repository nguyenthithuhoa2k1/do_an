<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Mail\MailCheckout;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\History;
class MailCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //add history
         $dataUser = Auth::user();
         $dataHistory = new History;
         $dataHistory->email = $dataUser['email'];
         $dataHistory->phone = $dataUser['phone'];
         $dataHistory->name = $dataUser['name'];
         $dataHistory->id_user = $dataUser['id'];
         $dataHistory->email = $dataUser['email'];
         $dataHistory->price = $request->sumtotal;
         $dataHistory->save(); 
         //gui mail 
        $cart = [];
        if(Session::has('carts')){
            $cart =[
                'subject'=>'thông tin đơn hàng',
                'body'=>Session::get('carts'),
                'sumtotal'=>$request->sumtotal,
            ];
            try{
                Mail::to('nhoa04112k1@gmail.com')->send(new MailCheckout($cart));
                return response()->json(['create'=>'great check your mail box']);
            }catch (Exception $th){
                return response()->json(['sorry']);
            }
       }
        
    }

    public function insert(Request $request)
    {
        
        
    }


}
