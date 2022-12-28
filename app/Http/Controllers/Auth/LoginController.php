<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
class LoginController extends Controller
{
   public function index()
   {


      return view('auth.login');
   }


   public function authenticate(Request $request)
   {
      $user = $request->validate([
         'email' => ['required', 'email'],
         'password' => ['required', 'min:8']
      ]);

         if (!  auth()->attempt($user)) {
            return redirect()->route('login')->with('message', 'Invalid email or password');
         }else if (auth()->user()->active == 0) {
            auth()->logout();
               
            return redirect()->route('login')->with('message', 'We are still checking your information, Please wait');
         }
         if(auth()->user()->email_verified_at == null){
            $user = auth()->user();
            event(new Registered($user));
            return redirect()->route('login')->with('message', 'please check your email to verify');
         }

      return redirect()->route('home');
   }
}
