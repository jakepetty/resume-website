<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

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

        \Session::flash('message', __('Your message has been sent. Please allow 24-48 hours for a reply. Have a wonderful day!'));
        \Session::flash('name', $data['name']);

        return back();
    }
}
