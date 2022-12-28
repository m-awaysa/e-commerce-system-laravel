<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\NameValidate;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

 
 
class RegisterController extends Controller
{
    public function index()
    {

        return view('auth.register');
    }

    public function create(Request $request)
    {
      $user=  $request->validate([
             'first_name'=>['required','min:2','max:255','string',new NameValidate()],
             'last_name'=>['required','min:2','max:255','string',new NameValidate()],
             'email'=>['required','email','min:3','max:255','unique:users,email'],
             'address'=>['required','min:3','max:255','string'],
             'company_name'=>['required','min:3','max:255','string'],
             'company_number'=>['required','numeric','min:99999999','max:999999999999'],
             'phone_number'=>['required','numeric','min:99999999','max:999999999999'],
             'password'=>['required','min:8','max:255','confirmed'],
        ]);
       
      $user['role']=0;
      $user['active']=0;
      $user['discount']=0;
      $user['password']=Hash::make( $user['password']);
   

      User::create($user);

        return redirect()->route('register')->with('message','We received your request successfully');
    }
}
