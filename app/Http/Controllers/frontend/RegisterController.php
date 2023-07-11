<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Http\Requests\ErrorRegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataCountry = Country::all();
        return view('frontend.users.Register',compact('dataCountry'));
    }

    public function insert(ErrorRegisterRequest $request)
    {

        $dataCountry = Country::all();
        $file=$request->avatar;
        $fileName='';
        if(!empty($file)){
            $fileName=$file->getClientOriginalName();
        }
        if(!empty($file)){
            $file->move('frontend/upload',$fileName);
        }
        $dataRegister = new User();
        $dataRegister->avatar=$fileName;
        $dataRegister->level=0;
        $dataRegister->name=$request->name;
        $dataRegister->email=$request->email;
        $dataRegister->password=Hash::make($request->password);
        $dataRegister->phone=$request->phone;
        $dataRegister->id_country=$request->id_country;
        if($dataRegister->save()) {
            
            return redirect()->route('member_register')->with('success',('create profile success'));
        }else{
            return redirect()->route('member_register')->withErrors('create profile error');
        }
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
