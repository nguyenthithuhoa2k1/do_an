<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MemberLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.users.login');
    }

    public function login(MemberLoginRequest $request)
    {
        $login=[
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>0
        ];
        $remember=false;
        if($request->remember_me){
            $remember=true;
        }
        $this->middleware('member');
        if(Auth::attempt($login,$remember)){
            return redirect()->route('member_home')->with('success','login success.');
        }else{
            return redirect()->back()->withErrors('login errors.');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Memberlogin');
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
