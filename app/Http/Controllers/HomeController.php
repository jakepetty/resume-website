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
        $projects = Project::orderBy('order', 'ASC')->get();
        $languages = Language::orderBy('order', 'ASC')->get();
        $frameworks = Framework::orderBy('order', 'ASC')->get();
        $applications = Application::orderBy('order', 'ASC')->get();
        $servers = Server::orderBy('order', 'ASC')->get();
        return view('home.index', compact('projects', 'languages', 'frameworks', 'applications', 'servers'));
    }
}
