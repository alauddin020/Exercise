<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FormController extends Controller
{
    //TODO:: use data tables library in laravel
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Form::addSelect('id','name','email','number','password')
                ->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $action = '<a class="btn btn-info" id="show-user" href="/forms/'.$row->id.'/edit">Edit</a>
                    ';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('datatable.index');

    }
    //TODO:: large data filtering in custom search
    public function custom(Request $request)
    {
       $forms = Form::paginate(25);
        if ($request->ajax())
        {
            if ($request->has('search'))
            {
                $forms = Form::where('name','like', '%' . $request->search . '%')
                    ->orWhere('id','like', '%' . $request->search . '%')
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
            return  $data = view('form.custom',compact('forms'))->render();
        }
        return view('form.index',compact('forms'));
    }
    //TODO::  New Data create in database
    public function create()
    {
        return view('form.create');
    }

    //TODO:: Data store in database
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
    //TODO:: local Search form specific key type
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
    //TODO:: Edit Data Show in blade file
    public function edit(Form $form)
    {
        return view('form.edit',compact('form'));
    }
    //TODO:: Update Data
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
        return redirect()->route('custom')->with('message','Information Update Successfull');
    }

    //TODO:: Form Data Delete From Database
    public function destroy(Form $form)
    {
       $form->delete();
    }
}
