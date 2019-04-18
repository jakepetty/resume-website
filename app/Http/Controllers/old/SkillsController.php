<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = Skill::sortable()->paginate(15);

        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('skills.create');
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
        $validatedData = $request->validate([
            'name' => 'required|min:1',
            'start_date' => 'required|numeric|min:1950|max:' . date('Y'),
            'end_date' => 'required|numeric|min:1950|max:' . date('Y'),
            'is_public' => 'boolean|nullable'
        ]);
        Skill::create($validatedData);

        return redirect(route('skills.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //
        $data = $request->validate([
            'name' => 'required|min:1',
            'start_date' => 'required|numeric|min:1950|max:' . date('Y'),
            'end_date' => 'required|numeric|min:1950|max:' . date('Y'),
            'is_public' => 'boolean|nullable'
        ]);

        $skill->update($data);

        return redirect(route('skills.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
        $skill->delete();
        return back();
    }
}
