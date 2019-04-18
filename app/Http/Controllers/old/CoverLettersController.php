<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoverLetter;

class CoverLettersController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
            'content' => 'required'
        ]);
        $coverLetter->update($data);

        return back();
    }
}
