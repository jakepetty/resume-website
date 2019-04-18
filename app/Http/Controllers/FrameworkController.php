<?php

namespace App\Http\Controllers;

use App\Framework;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $frameworks = Framework::sortable()->paginate(15);

        return view('frameworks.index', compact('frameworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frameworks.create');
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
            'url' => 'required|url'
        ]);

        Framework::create($data);

        return redirect(route('frameworks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Framework  $framework
     * @return \Illuminate\Http\Response
     */
    public function edit(Framework $framework)
    {
        //
        return view('frameworks.edit', compact('framework'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Framework  $framework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Framework $framework)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'url' => 'required|url'
        ]);

        $framework->update($data);

        return redirect(route('frameworks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Framework  $framework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Framework $framework)
    {
        //
        $framework->delete();

        return back();
    }
}
