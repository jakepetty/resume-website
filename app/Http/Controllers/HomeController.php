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
        $projects = Project::orderBy('order', 'ASC')->get();
        $skills = Skill::orderBy('order', 'ASC')->get();

        return view('home.index', compact('projects', 'skills'));
    }
}
