@extends('layouts.app')
@section('content')
    <div class="" style="margin: 10px;padding: 10px">
        <div class="card">
            <div class="card-header">
                <strong>Search</strong>
                <a role="button" class="btn btn-xs btn-success float-right" href="{{route('forms.index')}}">Back</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse table-bordered table-responsive">
                    <thead class="thead-inverse">
                    @if (count($forms))
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Password</th>
                            <th>Select</th>
                            <th>Multi Select</th>
                            <th>Textarea</th>
                            <th>Radio</th>
                            <th>Checkbox</th>
                            <th>Color</th>
                            <th>Date</th>
                            <th>Month</th>
                            <th>File</th>
                            <th>Time</th>
                            <th>Week</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    @endif
                    <tbody>
                    @forelse($forms as $key=>$form)
                        <tr id="{{$form->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$form->name}}</td>
                            <td>{{$form->email}}</td>
                            <td>{{$form->number}}</td>
                            <td>{{$form->password}}</td>
                            <td>{{$form->select}}</td>
                            <td>
                                @if (count($form->multi_select))
                                    <ul>
                                        @foreach ($form->multi_select as $select)
                                            <li>{{$select}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>
                                {{$form->textarea}}
                            </td>
                            <td>{{$form->radio}}</td>
                            <td>
                                @if (count($form->checkbox))
                                    <ul>
                                        @foreach ($form->checkbox as $checkbox)
                                            <li>{{$checkbox}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td style="background-color: {{$form->color}}"></td>
                            <td>{{$form->date}}</td>
                            <td>{{$form->month}}</td>
                            <td>
                                <img alt="" height="50" width="50" src="/storage/images/{{$form->file}}">
                            </td>
                            <td>{{$form->time}}</td>
                            <td>{{$form->week}}</td>
                            </tr>
                    @empty
                        <h3>Search Result Not Found</h3>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
