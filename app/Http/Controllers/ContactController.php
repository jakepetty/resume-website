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

        return back();
    }
}
