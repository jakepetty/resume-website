<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Mail\Mailable;
use App\Mail\ContactEmail;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

class ContactController extends Controller
{
    //
    public function send(Request $message)
    {
        $data = $message->validate([
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);
        $job = (new SendEmailJob($data));
        dispatch($job);

        return back();
    }
}
