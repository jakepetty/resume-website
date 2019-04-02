<?php

namespace App\Http\Controllers;
use App\Tool;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tools = Tool::sortable()->paginate(15);
        return view('tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tools.create');
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
            'start_date' => 'required|numeric|min:2003|max:' . date('Y'),
            'end_date' => 'required|numeric|min:2003|max:' . date('Y'),
            'level' => 'required|numeric|min:0|max:100',
        ]);
        Tool::create($validatedData);

        return redirect(route('tools.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        //
        return view('tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|min:1',
            'start_date' => 'required|numeric|min:2003|max:' . date('Y'),
            'end_date' => 'required|numeric|min:2003|max:' . date('Y'),
            'level' => 'required|numeric|min:0|max:100',
        ]);
        $tool->update($validatedData);

        return redirect(route('tools.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        //
        $tool->delete();
        return back();
    }
}
