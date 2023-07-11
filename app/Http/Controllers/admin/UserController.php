<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Http\Requests\ErorrProfileRequest;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check())
        {
            $id = Auth::id();
            $user = Auth::user();
            $countries = Country::all();

            return view('admin.users.Profile',compact('user','countries'));
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
        
        // $user = Auth::user();
        // return view('admin.users.Profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ErorrProfileRequest $request)
    {

        
        $userId = Auth::id();
        $user = User::findOrFail($userId);



        // $user->name = $request['name'];
        // $user->email = $request['email'];
        // $user->phone = $request['phone'];

        $data=$request->all();

        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }

        if($data['password']){
            $data['password']=bcrypt($data['password']);
        }else{
            $data['password']=$user->password;
        }
       
        if($user->update($data)){

            if(!empty($file)){
                $file->move('admin/upload',$file->getClientOriginalName());
            }
            return redirect()->back()->with('success',('update profile success'));
        }else{
            return redirect()->back()->withErrors('Update profile error');
        }

       

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
    }
}



//         $userId = Auth::id();
//         $user = User::findOrFail($userId);"Code tham khao update profile:
// public function update(UpdateProfileRequest $request)
//     {
//         $userId = Auth::id();
//         $user = User::findOrFail($userId);

//         $data = $request->all();
//         $file = $request->avatar;
//         if(!empty($file)){
//             $data['avatar'] = $file->getClientOriginalName();
//         }
        
//         if ($data['password']) {
//             $data['password'] = bcrypt($data['password']);
//         }else{
//             $data['password'] = $user->password;
//         }
       
//         if ($user->update($data)) {
//             if(!empty($file)){
//                 $file->move('upload/user/avatar', $file->getClientOriginalName());
//             }
//             return redirect()->back()->with('success', __('Update profile success.'));
//         } else {
//             return redirect()->back()->withErrors('Update profile error.');
//         }

//     }

// "                               
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                