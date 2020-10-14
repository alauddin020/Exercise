@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit Quiz</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        @if (\Session::has('fa'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Success!</strong> {{\Session::get('fa')}}.
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{route('quiz.update',$quiz->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="quiz">Quiz Name</label>
                                    <input readonly type="text" value="{{ $quiz->name }}" name="name" class="form-control @error('last_name') is-invalid @enderror" id="quiz" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Question Points* </label>
                                    <input readonly onpaste="return false;" class="form-control positive" type="text" onkeypress="return isNumber(event)" autocomplete="off"
                                           name="positive_marks" id="qmark"
                                           value="{{$quiz->points}}" required>
                                    <p class="help-block"></p>
                                    @if($errors->has('qmark'))
                                        <p class="help-block">
                                            {{ $errors->first('qmark') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="">
                                <div class="card-heading">
                                    <h3 class="card-title"><b>QUESTION TO THIS QUIZ</b> ( Total Question -<span id="nthquestion">{{$quiz->question->count()}}</span>)</h3>
                                </div>

                                @foreach ($quiz->question as $key=>$question)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group text-left">
                                                <span><b>(Question No -{{$key+1}}) </b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input readonly type="text" class="form-control" value="{{$question->name}}" name="question_text[]" placeholder="Question Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($question->option as $a=>$option)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input readonly type="text" value="{{$option->option}}" class="form-control" id="option{{$a+1}}" name="option{{$a+1}}[]" placeholder="Option {{$a+1}}" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><input {{$option->correct==1 ?'checked' : 'disabled'}} type="radio" value="{{$option->correct==1 ? 1 : 0}}" name="correct{{$key+1}}"> Correct</label>
                                                </div>
                                            </div>
                                        </div>
                            @endforeach
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
