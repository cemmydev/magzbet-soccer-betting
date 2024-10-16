<?php

namespace App\Http\Controllers;

use App\Mail\WelcomEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendWelcomeEmail() {
        $title = 'Welcome to Magzbet.com';
        $body = 'Thank you for participating';

        Mail::to('olekstehnei@outlook.com')->send(new WelcomEmail($title, $body));

        return "email sent successfully";
    }
}