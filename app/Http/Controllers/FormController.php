<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index()
    {
       return $forms = Form::all();

    }


    public function create()
    {
        return view('form.create');
    }


    public function store(Request $request)
    {
        $input = $request->except('_token');
        if ($request->has('checkbox'))
        {
            $input['checkbox'] = $request->checkbox;
        }
        if ($request->has('multi_select'))
        {
            $input['multi_select'] = $request->multi_select;
        }
        if ($request->hasFile('file'))
        {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('images',$filename,'public');
            $input['file'] = $filename;
        }
        Form::create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
