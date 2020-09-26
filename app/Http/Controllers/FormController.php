<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::all();
        return view('form.index',compact('forms'));

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

    public function show(Form $form)
    {

    }
    public function search(Request $request)
    {
        $search = Form::query();
        if ($request->has('search') && $request->has('key'))
        {
            if ($request->key !='')
            {
                $forms = $search->where($request->key,'like', '%' . $request->search . '%')->get();
                return view('form.search',compact('forms'));
            }
            else
            {
                abort(403,'key value empty');
            }

        }
        return redirect()->back();
    }

    public function edit(Form $form)
    {
        return view('form.edit',compact('form'));
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
        $input = $request->except(['_token','_method']);
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
        $form->update($input);
        return redirect()->route('forms.index');
    }

    public function destroy(Form $form)
    {
       $form->delete();
    }
}
