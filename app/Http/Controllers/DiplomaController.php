<?php

namespace App\Http\Controllers;

use App\Diploma;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $diplomas = diploma::sortable()->paginate(15);

        return view('diplomas.index', compact('diplomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('diplomas.create');
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
            'major' => 'nullable',
            'location' => 'required',
            'year' => 'nullable'
        ]);

        diploma::create($data);

        return redirect(route('diplomas.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function edit(Diploma $diploma)
    {
        //
        return view('diplomas.edit', compact('diploma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diploma $diploma)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'major' => 'nullable',
            'location' => 'required',
            'year' => 'nullable'
        ]);

        $diploma->save($data);

        return redirect(route('diplomas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diploma $diploma)
    {
        //
        $diploma->delete();

        return back();
    }
}
