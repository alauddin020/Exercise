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
                                <input type="text" value="{{ $quiz->name }}" name="name" class="form-control @error('last_name') is-invalid @enderror" id="quiz" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="control-label">Question  Points* </label>
                                <input onpaste="return false;" class="form-control positive" type="text" onkeypress="return isNumber(event)"  autocomplete="off"
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
                                            <input type="text" class="form-control" value="{{$question->name}}" name="question_text[]" placeholder="Question Title" required>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($question->option as $a=>$option)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text"  value="{{$option->option}}" class="form-control" id="option{{$a+1}}" name="option{{$a+1}}[]"  placeholder="Option {{$a+1}}" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><input {{$option->correct==1 ?'checked' : ''}} type="radio" value="{{$a+1}}" name="correct{{$key+1}}"> Correct</label>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6 ">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="text" class="form-control" id="option2" name="option2[]"  placeholder="Option 2" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div>--}}
{{--                                                    <label><input type="radio"  value="2" name="correct1" > Correct</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row ismcq">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="text" class="form-control ishide" id="option3" name="option3[]" placeholder="Option 3" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div>--}}
{{--                                                    <label><input type="radio" value="3" name="correct1" > Correct</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row ismcq">--}}
{{--                                        <div class="col-md-6 ">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="text" class="form-control ishide" id="option4" name="option4[]"  placeholder="Option 4" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div>--}}
{{--                                                    <label><input type="radio" value="4" name="correct1" > Correct</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endforeach
                            @endforeach
                            <div id="education_fields">

                            </div>
                            <div class="row">
                                <div class="col-md-12 nopadding">
                                    <div class="form-group text-right">
                                        <button class="btn btn-outline-success btn-sm" type="button"  onclick="education_fields();"> ADD MORE QUESTION </button>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <button type="submit"  id="publish" class="btn btn-outline-secondary btn-sm float-lg-right"><i class="ik ik-plus"></i>Update Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('input').on('input', function() {
                $(this).val($(this).val().replace(/[^a-z0-9 ]/gi, ''));
            });
        })
        var QuizType='1';
        isNumber=(evt)=>{
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        var room = '{{$quiz->question->count()}}';
        education_fields=()=>{

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<div class="row"><div class="col-sm-12"> <div class="form-group text-left"> <b>(Question No -' + room + ') </b><button class="btn btn-outline-danger btn-sm float-right"  type="button" onclick="remove_education_fields(' + room + ');"> Remove </button><div class="clear"></div></div></div></div></div>'
                + '<div class="row"><div class="col-sm-12">'
                + '<div class="form-group">'
                + '<input type="text" class="form-control" name="question_text[]"  placeholder="Question Title" required>'
                + '</div>'
                + '</div></div>'
                + '<div class="row"><div class="col-sm-6">'
                + '<div class="form-group">'
                + '<input type="text" class="form-control"  name="option1[]"  placeholder="Option 1" required>'
                + '</div>'
                + '</div>'
                + '<div class="col-md-6">'
                + '<div class="form-group">'
                + '<label><input type="radio" required value="1" name="correct' + room + '"> Correct</label>'
                + '</div>'
                + '</div></div>'
                + '<div class="row"><div class="col-md-6">'
                + '<div class="form-group">'
                + '<input type="text" class="form-control" id="option2" name="option2[]" placeholder="Option 2" required>'
                + '</div>'
                + '</div>'
                + '<div class="col-md-6">'
                + '<div class="form-group">'
                + '<label><input type="radio" value="2" name="correct' + room + '"> Correct</label>'
                + '</div>'
                + '</div></div>'
                + '<div class="row ismcq"><div class="col-md-6">'
                + '<div class="form-group">'
                + '<input type="text" class="form-control ishide" id="option3" name="option3[]"  placeholder="Option 3" required>'
                + '</div>'
                + '</div>'
                + '<div class="col-md-6">'
                + '<div class="form-group">'
                + '<label><input type="radio" value="3" name="correct' + room + '"> Correct</label>'
                + '</div>'
                + '</div></div>'
                + '<div class="row ismcq"><div class="col-md-6">'
                + '<div class="form-group">'
                + '<input type="text" class="form-control ishide" id="option4" name="option4[]" placeholder="Option 4" required>'
                + '</div>'
                + '</div>'
                + '<div class="col-md-6">'
                + '<div class="form-group">'
                + '<label><input type="radio" value="4" name="correct' + room + '"> Correct</label>'
                + '</div>'
                + '</div></div>'
                + '<div class="row"><div class="col-md-12">'


            $('#nthquestion').html(room);
            objTo.appendChild(divtest);
            $(".ishide:hidden").each(function () {
                $(this).attr("required", false);

            });
            $(".ishide:visible").each(function () {
                $(this).attr("required", true);
            });

            checknoquestion();
        }

        remove_education_fields=(rid)=>{
            $('.removeclass' + rid).remove();
            room--;
            $('#nthquestion').html(room);
            checknoquestion();
        }

        qMark=(q)=>{
            var n = $("#tQuestion").val();
            var sum = parseInt(n) * parseFloat(q);
            $('#tmark').val(sum);
            $('.totalMarks').html('');
        }

        addmoreq=(totalq)=>{
            education_fields();

        }

        checknoquestion=()=>{
            if (room != parseInt($('#tmark').val())) {
                $('#publish').attr('disabled', false);//change it
            } else {
                $('#publish').attr('disabled', false);
            }
        }

        checknoquestion();
    </script>
@endsection
