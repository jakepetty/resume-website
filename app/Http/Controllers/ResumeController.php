<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Language;
use App\Server;
use App\Framework;
use App\Application;
use App\Diploma;
use App\CoverLetter;
use App\Classes\ResumeClass;

class ResumeController extends Controller
{
    //
    public function index(CoverLetter $coverLetter)
    {
        //$coverLetter = CoverLetter::get($id);
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
        $resume->cover_letter($coverLetter->body);
        $resume->contact();

        $languages = Language::orderBy('order', 'ASC')->pluck('name')->toArray();
        $frameworks = Framework::orderBy('order', 'ASC')->pluck('name')->toArray();
        $applications = Application::orderBy('order', 'ASC')->pluck('name')->toArray();
        $servers = Server::orderBy('order', 'ASC')->pluck('name')->toArray();

        $skills = array_merge($languages, $frameworks, $applications, $servers);
        $resume->skills($skills);
        $resume->jobs(Experience::orderBy('end_date', 'DESC')->get()->toArray());
        $resume->education(Diploma::all()->toArray());
        $resume->show();
        exit();
    }
}
