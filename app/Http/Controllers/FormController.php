<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FormController extends Controller
{

    public function index(Request $request)
    {
        //$forms = Form::all();
        //,'textarea','month','password','color','date','time','created_at'
        if ($request->ajax()) {
            $data = Form::addSelect('id','name','email','number','password')
                ->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $action = '<a class="btn btn-info" id="show-user" data-toggle="modal" data-id='.$row->id.'>Show</a>
                    <a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->id.'>Edit </a>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a id="delete-user" data-id='.$row->id.' class="btn btn-danger delete-user">Delete</a>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('datatable.index');

    }

    public function custom(Request $request)
    {
        if ($request->ajax())
        {
            if ($request->has('search'))
            {
                $forms = Form::where('name','like', '%' . $request->search . '%')
                    ->orWhere('email','like', '%' . $request->search . '%')
                    ->orWhere('number','like', '%' . $request->search . '%')
                    ->orWhere('textarea','like', '%' . $request->search . '%')
                    ->orWhere('select','like', '%' . $request->search . '%')
                    ->orWhere('radio','like', '%' . $request->search . '%')
                    ->orWhere('date','like', '%' . $request->search . '%')
                    ->orWhere('month','like', '%' . $request->search . '%')
                    ->orWhere('time','like', '%' . $request->search . '%')
                    ->orWhere('week','like', '%' . $request->search . '%')
                    ->paginate(25);
                $pagination = $forms->appends ( array (
                    'search'   => $request->search,
                ) );
                return $data = view('form.filter',['forms'=>$forms])->withQuery ( $pagination )->render();
            }
            $forms = Form::paginate(25);
            return  $data = view('form.custom',compact('forms'))->render();
        }
//        $forms = Form::paginate(25);
        return view('form.index');
    }

//    public function customSearch(Request $request)
//    {
//       $forms = Form::where('name','like', '%' . $request->search . '%')
//                    ->orWhere('email','like', '%' . $request->search . '%')
//                    ->orWhere('number','like', '%' . $request->search . '%')
//                    ->orWhere('textarea','like', '%' . $request->search . '%')
//                    ->orWhere('select','like', '%' . $request->search . '%')
//                    ->orWhere('radio','like', '%' . $request->search . '%')
//                    ->orWhere('date','like', '%' . $request->search . '%')
//                    ->orWhere('month','like', '%' . $request->search . '%')
//                    ->orWhere('time','like', '%' . $request->search . '%')
//                    ->orWhere('week','like', '%' . $request->search . '%')
//                    ->paginate(25);
//        $pagination = $forms->appends ( array (
//            'search'   => $request->search,
//        ) );
//       return $data = view('form.filter',['forms'=>$forms])->withQuery ( $pagination )->render();
//    }
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
