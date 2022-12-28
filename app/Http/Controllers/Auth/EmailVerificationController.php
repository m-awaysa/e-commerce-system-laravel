<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function index(){
        return view('auth.verify-email');
    }

    public function verificationVerify(EmailVerificationRequest $request){
        $request->fulfill();
 
        return redirect('/home');
    }


    public function sendEmailVerification(Request $request){
        $request->user()->sendEmailVerificationNotification();
 
        return back()->with('message', 'Verification link sent!');
        
        
    }
}
