<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Skill;
use App\Diploma;
use App\Project;
use App\CoverLetter;
use App\Classes\ResumeClass;

class ResumeController extends Controller
{
    //
    public function index(CoverLetter $coverLetter)
    {
        $resume = new ResumeClass();
        $resume->setContactInfo([
            'seeking' => config('app.resume.seeking'),
            'name' => config('app.resume.name'),
            'phone' => config('app.resume.phone'),
            'email' => config('app.resume.email'),
            'street_address' => config('app.resume.location.street'),
            'city' => config('app.resume.location.city'),
            'state' => config('app.resume.location.state'),
            'zip' => config('app.resume.location.zip'),
            'github' => sprintf('https://github.com/%s', config('app.github.username')),
            'summary' => "I've dedicated my life to programming and hope to land a salary job doing what I love. My passion for the field runs deep with knowledge in over 14 programming languages and constantly learning to better myself and help others along the way"
        ]);
        if ($coverLetter->body != "None") {
            $resume->cover_letter($coverLetter->body);
        }
        $resume->contact();

        $skills = Skill::orderBy('order', 'ASC')->get()->toArray();
        $resume->skills($skills);
        $resume->jobs(Experience::orderBy('end_date', 'DESC')->get()->toArray());
        $resume->education(Diploma::all()->toArray());
        $resume->projects(Project::orderBy('order', 'ASC')->get()->toArray());
        $resume->show();
        exit();
    }
}
