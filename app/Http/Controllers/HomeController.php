<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skills = \App\Skill::all();
        $tools = \App\Tool::all();
        $projects = \App\Project::all()->sortBy('github_id');

        return view('home.index', compact('skills', 'projects', 'tools'));
    }
}
