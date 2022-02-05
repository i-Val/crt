<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:70',
            'email' => 'required|email',
            'message' => 'required|string|max:100'
        ]);

        //Preparing to send mail
        $data = [
            'name' =>  $request->get('name'), 
            'email' => $request->get('email'),
            'messageBody' => $request->get('message')
        ];

        Mail::send( 'mail.template', $data, function($send){
            $send->to('ucheojemba@gmail.com', 'Uche Ojemba & Associates');
            $send->subject('Contact From Website');
            // $send->from()
        });

        session()->put([
            'mail_status' => true,
            'mail_status_msg' => 'Email was sent successfully',
        ]);

        return view('Pages.contact');
    }
}
