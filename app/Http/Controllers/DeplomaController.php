<?php

namespace App\Http\Controllers;

use App\Deploma;
use Illuminate\Http\Request;

class DeplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deplomas = Deploma::sortable()->paginate(15);

        return view('deplomas.index', compact('deplomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('deplomas.create');
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

        Deploma::create($data);

        return redirect(route('deplomas.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deploma  $deploma
     * @return \Illuminate\Http\Response
     */
    public function edit(Deploma $deploma)
    {
        //
        return view('deplomas.edit', compact('deploma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deploma  $deploma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deploma $deploma)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'major' => 'nullable',
            'location' => 'required',
            'year' => 'nullable'
        ]);

        $deploma->save($data);

        return redirect(route('deplomas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deploma  $deploma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deploma $deploma)
    {
        //
        $deploma->delete();

        return back();
    }
}
