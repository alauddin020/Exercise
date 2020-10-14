@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><span id="badge{{$user->id}}" class="badge badge-{{$user->email_verified_at==null ? 'danger' : 'success'}}">{{$user->email_verified_at==null ? 'Inactive' : 'Active'}}</span></td>
                        <td>
                            @if($user->email_verified_at==null )
                            <button id="{{$user->id}}" type="button"  onclick="activeUser('{{$user->id}}')" class="btn btn-outline-success btn-sm">Active</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        activeUser=(id)=>{
            $.ajax({
                url : '{{route('profile')}}',
                type: 'POST',
                data: {id:id, _token:'{{csrf_token()}}'},
                success: function (data)
                {
                    $("#"+id).prop('disabled', true).addClass('btn btn-warning btn-sm').html('Activated')
                    $("#badge"+id).removeClass('badge-danger').addClass('badge badge-success').html('Active')
                    alert(data);
                }
            })
        }
    </script>
@endsection
