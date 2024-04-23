<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Url;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }

    public function contact_create() {
        return view('contact');
    }

    public function contact_store() {
        \request()->validate([
            'email'   => 'required|email',
            'subject' => 'required|min:3',
            'body'    => 'required|min:10'
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail(request()->post()));

        return redirect()->route('home')->with('notification', 'Your message has arrived us, we will send you answer mail in 2-6 hours');
    }
}
