<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =[
            'subject'=>'cambo tutorial Mail',
            'body'=>'hello this is my email delivery',
        ];
        try{
            Mail::to('nhoa04112k1@gmail.com')->send(new MailNotify($data));
            return response()->json(['great check your mail box']);
        }catch (Exception $th){
            return response()->json(['sorry']);
        }
    }



    