<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;

class EducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $educations = Education::sortable()->paginate(15);

        return view('educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('educations.create');
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
        $education = $request->validate([
            'name' => 'required',
            'major' => 'nullable',
            'location' => 'required',
            'year' => 'nullable'
        ]);

        Education::create($education);

        return redirect(route('educations.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
        return view('educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'major' => 'nullable',
            'location' => 'required',
            'year' => 'nullable'
        ]);

        $education->update($data);

        return redirect(route('educations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
        $education->delete();

        return back();
    }
}
