@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="card  mt-2">
        <div class="card-header">
            <h3 class="float-left">All Quiz</h3>
           <div class="float-right">
               <form>

               </form>
               <a id="json" style="display: none" target="_blank" class="btn btn-outline-success btn-sm" href="#" role="button">View Json File</a>
               <button role="button" id="saveJson" onclick="saveJsonFormat()" class="btn-outline-info btn-sm btn">Save Json</button>
               <a role="button" class="btn-outline-secondary btn-sm btn" href="{{route('quiz.create')}}">Create New Quiz</a>
           </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($quizzes as $key=>$quiz)
                    <tr id="{{$quiz->id}}">
                        <td>{{$key+1}}</td>
                        <td>{{$quiz->name}}</td>
                        <td>
                            <button type="button"  onclick="deleteQuiz('{{$quiz->id}}','{{route('quiz.destroy',$quiz->id)}}')" class="btn btn-sm btn-danger">Delete</button>
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
        saveJsonFormat=()=>{
            let btn = $('#saveJson');
            btn.html('loading...');
            $.ajax({
                url: '{{route('quiz.store')}}',
                type : 'POST',
                data: {_token:'{{csrf_token()}}'},
                success: function (data){
                    btn.html('Save Json')
                    $('#json').show().attr("href",data);
                }
            })
        }
        deleteQuiz=(id,route)=>{
            if (confirm('Are you sure ?')) {
                $.ajax({
                    url: route,
                    type : 'DELETE',
                    data: {id:id,_token:'{{csrf_token()}}'},
                    success: function (data){
                        $('#'+id).hide();
                    }
                })
            }
        }
    </script>
@endsection
