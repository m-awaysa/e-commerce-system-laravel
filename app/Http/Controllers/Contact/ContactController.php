<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact-us');
    }


    public function sent(Request $request)
        {
          
            $this -> validate ($request,[
                'email' => ['required','max:30','email'],
                'mail_subject' => ['required','max:60','string'],
                'mail_body' => ['required','string','max:1000'],    
            ]);
         
         
          Mail::to('theawaysa@gmail.com')->send( new ContactEmail($request->only(['email','mail_body','mail_subject'])));
            
        
            return redirect()->route('contactUs')->with('message','we have received your mail');
        }

}
