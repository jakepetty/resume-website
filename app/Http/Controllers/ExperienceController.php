<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $experiences = Experience::sortable()->paginate(15);

        return view('experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('experiences.create');
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
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duties' => 'nullable',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable'
        ]);

        Experience::create($data);

        return redirect(route('experiences.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
        return view('experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duties' => 'nullable',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable'
        ]);

        $experience->update($data);

        return redirect(route('experiences.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        //
        $experience->delete();

        return back();
    }
}
