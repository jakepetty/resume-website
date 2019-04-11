<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Project;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skills = Skill::where('is_public', true)->get();
        $projects = Project::all()->sortBy('github_id');

        return view('home.index', compact('skills', 'projects'));
    }
}
