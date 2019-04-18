<?php

namespace App\Http\Controllers;

use App\Language;
use App\Framework;
use App\Project;
use App\Application;
use App\Server;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all()->sortBy('github_id');
        $languages = Language::all();
        $frameworks = Framework::all();
        $applications = Application::all();
        $servers = Server::all();
        return view('home.index', compact('projects', 'languages', 'frameworks', 'applications', 'servers'));
    }
}
