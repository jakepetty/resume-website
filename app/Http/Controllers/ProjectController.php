<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Classes\GithubClass;
use Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::sortable()->paginate(15);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'github_id' => 'nullable',
            'name' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'demo' => 'nullable|url'
        ]);

        $project = Project::create($data);
        if ($request->image) {
            Image::make($request->image->getPathname())->fit(535, 535)->save(public_path('images/projects/') . $project->id . '.jpg', 100);
        }

        return redirect(route('projects.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $data = $request->validate([
            'github_id' => 'nullable',
            'name' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'demo' => 'nullable|url'
        ]);

        $project->update($data);

        if ($request->image) {
            Image::make($request->image->getPathname())->fit(535, 535)->save(public_path('images/projects/') . ($project->github_id ? $project->github_id : $project->id)  . '.jpg', 100);
        }

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        if ($project->delete()) {
            unlink(public_path('images/projects/') . ($project->github_id ? $project->github_id : $project->id) . '.jpg');
        }
        return back();
    }
    /**
     * Pulls new repos from github.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {

        $github = new GithubClass();
        $repos = $github->get("https://api.github.com/user/repos");
        foreach ($repos as $repo) {
            // Convert name to Human Readable
            $name = ucwords(str_replace('-', ' ', $repo->name));
            $name = str_replace('Php', 'PHP', $name);
            $name = str_replace('Js', 'JS', $name);
            $name = str_replace('Cpp', 'CPP', $name);
            $name = str_replace('Css', 'CSS', $name);
            $name = str_replace('Html', 'HTML', $name);
            $name = str_replace('Jquery', 'jQuery', $name);
            $name = str_replace('Vb.net', 'VB.net', $name);
            $name = str_replace('Iss', 'ISS', $name);
            $name = str_replace('Hvac', 'HVAC', $name);

            // Check to see if the project already exists
            $exists = Project::where('github_id', $repo->id)->exists();
            if (!$exists) {
                // Save the project to database
                $project = new Project();
                $project->name = $name;
                $project->description = $repo->description;
                $project->url = $repo->html_url;
                $project->demo = $repo->homepage;
                $project->github_id = $repo->id;
                $project->save();
            }
        }
        return back();
    }
}
