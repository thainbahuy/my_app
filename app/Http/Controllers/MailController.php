<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class MailController extends Controller
{
    public function sendMail()
    {
        $data['title'] = "This is Test Mail Tuts Make";

        Mail::send('mails.demo', $data, function($message) {

            $message->to('thainguyenbahuy@gmail.com', 'Receiver Name')

                ->subject('Tuts Make Mail');
        });

        if (Mail::failures()) {
            return response([
                'result' => 'Sorry! Please try again latter'
            ], 500);
        }else{
            return response([
                'result' => 'send mail success'
            ], 200);
        }

    }
}
