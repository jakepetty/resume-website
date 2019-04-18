<?php

namespace App\Http\Controllers;

use App\CoverLetter;
use Illuminate\Http\Request;

class CoverLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coverLetters = CoverLetter::sortable()->paginate(15);

        return view('cover_letters.index', compact('coverLetters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cover_letters.create');
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
            'body' => 'required'
        ]);

        CoverLetter::create($data);

        return redirect(route('cover_letters.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CoverLetter  $coverLetter
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverLetter $coverLetter)
    {
        //
        return view('cover_letters.edit', compact('coverLetter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CoverLetter  $coverLetter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverLetter $coverLetter)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'body' => 'required'
        ]);

        $coverLetter->update($data);

        return redirect(route('cover_letters.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CoverLetter  $coverLetter
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverLetter $coverLetter)
    {
        //
        $coverLetter->delete();
        return back();
    }
}
