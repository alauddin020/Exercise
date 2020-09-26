@extends('layouts.app')
@section('content')
<div class="" style="margin: 10px;padding: 10px">
    <div class="card">
        <div class="card-header">
            <strong>All Data</strong>
            <a role="button" class="btn btn-xs btn-success float-right" href="{{route('forms.create')}}">Create</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 offset-6 float-right">
                        <form action="{{route('search')}}" method="GET">
                    <div class="row">
                            <div class="form-group mr-2">
                                <input type="text"  name="search" id="search" class="form-control" placeholder="Search Here" aria-describedby="helpId">
                            </div>
                            <div class="form-group ">
                                <select style="min-width: 150px;" name="key" class="select2 form-control" id="filter">
                                    <option value="name">Name</option>
                                    <option value="number">Number</option>
                                    <option value="email">Email</option>
                                    <option value="radio">Gender</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                            <div class="form-group ml-2">
                                <button  type="submit" class="btn btn-primary">Search</button>
                            </div>
                    </div>
                        </form>
                </div>
            </div>
            <table class="table table-striped table-inverse table-bordered table-responsive">
                <thead class="thead-inverse">
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
                            @if (isset($form->multi_select))
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
                            @if (isset($form->checkbox))
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
                        <td><a class="btn btn-primary" href="{{route('forms.edit',$form->id)}}" role="button">Edit</a>
                        <a class="btn btn-danger mt-2" onclick="deleteData('{{route('forms.destroy',$form->id)}}','{{$form->id}}')" href="javascript:void(0)" role="button">Delete</a></td>
                    </tr>
                @empty
                    <h4>No Data Found</h4>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        change=(id)=>
        {
            let field = $('#search');
            // if(id==3)
            // {
            //     field.attr('type','date').val('')
            // }
            // else
            // {
            //     field.attr('type','text').val('')
            // }
        }
        search=(value,filter)=>
        {
            if (value !='')
            {
                $.ajax({
                    url:'{{route('search')}}',
                    type: 'POST',
                    data:{
                        search:value,
                        key:filter,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (data) {
                        console.log(data)
                    }
                });
            }
        }
        deleteData=(route,id)=>{
            $.ajax({
                url:route,
                type: 'DELETE',
                data:{
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    $('#'+id).hide();
                    alert('Delete Successfully')
                }
            });
        }
    </script>
@endsection
