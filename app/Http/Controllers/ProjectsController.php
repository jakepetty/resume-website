<?php

namespace App\Http\Controllers;

use App\Project;
use App\Language;
use Illuminate\Http\Request;
use App\Classes\GithubClass;
use Image;

class ProjectsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
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
        $languages = Language::all();
        return view('projects.edit', compact('project', 'languages'));
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
            'name' => 'required|min:10',
            'description' => 'required',
            'url' => 'required',
            'homepage' => 'nullable|url',
            'languages' => 'required'
        ]);
        if ($request->image) {
            Image::make($request->image->getPathname())->fit(320, 240)->save(public_path('images/projects/') . $project->id . '.jpg', 100);
        }
        $project->update($data);
        $project->languages()->sync($request->languages);

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
            $file = public_path() . '/images/projects/' . $project->id . '.jpg';
            if (file_exists($file)) {
                unlink($file);
            }
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
            $langs = [];
            $languages = $github->get($repo->languages_url);
            foreach ($languages as $lang => $count) {
                if ($lang != 'Hack') {
                    $language = Language::firstOrCreate(['name' => $lang]);
                    $langs[] = $language->id;
                }
            }
            // Convert name to Human Readable
            $name = ucwords(str_replace('-', ' ', $repo->name));
            $name = str_replace('Php', 'PHP', $name);
            $name = str_replace('Js', 'JS', $name);
            $name = str_replace('Cpp', 'CPP', $name);
            $name = str_replace('Css', 'CSS', $name);
            $name = str_replace('Html', 'HTML', $name);
            $name = str_replace('Jquery', 'jQuery', $name);
            $name = str_replace('Vb.net', 'VB.net', $name);

            // Check to see if the project already exists
            $exists = Project::where('name', $name)->exists();
            if (!$exists) {
                // Set a default language eif one isn't provided
                if (!$repo->language || $repo->language == 'JavaScript') {
                    $repo->language = 'JS';
                }

                // Build the model
                $data = [
                    'name' => $name,
                    'description' => $repo->description,
                    'url' => $repo->html_url,
                    'homepage' => $repo->homepage,
                    'github_id' => $repo->id
                ];

                // Save the project to database
                $project = Project::create($data);
                $project->languages()->attach($langs);
            }
        }
        return back();
    }
}
