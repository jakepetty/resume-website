<?php

namespace App\Http\Controllers;

use App\Skill;
use App\ResumeJob;
use App\Classes\ResumeClass;

class ResumeController extends Controller
{
    //
    public function index()
    {
        $resume = new ResumeClass();
        $resume->setContactInfo([
            'name' => config('app.resume.name'),
            'phone' => config('app.resume.phone'),
            'email' => config('app.resume.email'),
            'street_address' => config('app.resume.location.street'),
            'city' => config('app.resume.location.city'),
            'state' => config('app.resume.location.state'),
            'zip' => config('app.resume.location.zip'),
            'github' => sprintf('https://github.com/%s', config('app.github.username'))
        ]);
        $resume->cover_letter(\App\CoverLetter::first()->content);
        $resume->contact();
        $resume->skills(Skill::all()->pluck('name')->toArray());
        $resume->jobs(ResumeJob::orderBy('end_date', 'DESC')->get()->toArray());
        $resume->education(\App\Education::all()->toArray());
        $resume->show();
        exit();
    }
}
