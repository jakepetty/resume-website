<?php

namespace App\Http\Controllers;

use App\Project;
use Cache;
use Illuminate\Http\Request;

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
        $this->getRepos();
        $projects = Project::sortable()->paginate(6);

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
            'name' => 'required|min:10',
            'description' => 'required',
            'url' => 'required',
            'language' => 'required'
        ]);
        if ($request->image) {
            $request->image->move(public_path('/images/projects'), $project->id . '.' . $request->image->getClientOriginalExtension());
        }
        $project->update($data);

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
    private function getRepos()
    {

        if (($repos = Cache::get('repos', [])) == false) {
            $ch = curl_init(config('app.github.api'));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $repos = json_decode(curl_exec($ch));
            Cache::put('repos', $repos, 3600);
            curl_close($ch);
        }

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

            // Check to see if the project already exists
            $exists = Project::where('name', $name)->exists();
            if (!$exists) {
                // Set a default language eif one isn't provided
                if (!$repo->language) {
                    $repo->language = 'JS';
                }

                // Build the model
                $project = [
                    'name' => $name,
                    'description' => $repo->description,
                    'url' => $repo->html_url,
                    'language' => $repo->language,
                    'github_id' => $repo->id
                ];

                // Save the project to database
                Project::create($project);
            }
        }
    }
}
