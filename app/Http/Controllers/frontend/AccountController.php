<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorAccountRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\Frontend\Product;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProduct = Product::all();
        $dataUser =  Auth::user();
        $id_user =  Auth::id();
        $dataCountry = Country::all();
        return view('frontend.account.Account',compact('dataUser','dataCountry','id_user','dataProduct'));
    }

    public function updateAccount(ErrorAccountRequest $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $data= $request->all();
        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar']= $file->getClientOriginalName();
        }
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        }else{
             $data['password']=$user->password;
        }
        if($user->update($data)){
            if(!empty($file)){
                $file->move('admin/upload/user',$file->getClientOriginalName());
            }
            return redirect()->back()->with('success','update success');
        }else{
            return redirect()->back()->withErrors('update errors');
        }
        
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
