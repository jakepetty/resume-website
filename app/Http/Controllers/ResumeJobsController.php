<?php

namespace App\Http\Controllers;

use App\ResumeJob;
use Illuminate\Http\Request;

class ResumeJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resume_jobs = ResumeJob::sortable()->paginate();

        return view('jobs.index', compact('resume_jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create');
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
        $job = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'duties' => 'nullable',
            'description' => 'required',
            'location' => 'nullable'
        ]);

        ResumeJob::create($job);

        return redirect(route('jobs.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ResumeJob $job)
    {
        //
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResumeJob $job)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'duties' => 'nullable',
            'description' => 'required',
            'location' => 'nullable'
        ]);

        $job->update($data);

        return redirect(route('jobs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResumeJob $job)
    {
        //
        $job->delete();
        return back();
    }
}
