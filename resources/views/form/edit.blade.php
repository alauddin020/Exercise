@extends('layouts.app')
@section('content')
    <div class="container-lg" style="padding-left: 0;padding-right: 0">
        <form method="POST" action="{{route('forms.update',$form->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-header"><strong>Form All Element</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="text" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input value="{{$form->name}}" type="text" name="name" class="form-control" id="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input value="{{$form->number}}"  type="number" name="number" class="form-control" id="number" placeholder="Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input value="{{$form->email}}"  type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input value="{{$form->password}}"  type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="select" class="col-sm-2 col-form-label">Select</label>
                                <div class="col-sm-10">
                                    <select name="select" id="select" class="form-control">
                                        <option value="home" {{$form->select=='home' ?'selected' : ''}}>Home</option>
                                        <option value="office" {{$form->select=='office' ?'selected' : ''}}>Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="select" class="col-sm-2 col-form-label">Multi Select</label>
                                <div class="col-sm-10">
                                    <select multiple name="multi_select[]" id="select" class="form-control">
                                        @php $a = ['home','office','other']; $c = []; @endphp
                                        @if (isset($form->multi_select))
                                            @foreach ($form->multi_select as $select)
                                                <?php $c[] = $select;?>
                                            <option value="{{$select}}" selected>{{ucfirst($select)}}</option>
                                            @endforeach
                                        @endif
                                        @foreach($a as $b)
                                            @if (! in_array($b,$c))
                                                <option value="{{$b}}">{{ucfirst($b)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="textarea" class="col-sm-2 col-form-label">Textarea</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="textarea" name="textarea">{{$form->textarea}} </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Radio</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio" id="gender1" value="male" {{$form->radio=='male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  name="radio" id="gender2" value="female" {{$form->radio=='female' ? 'checked' : '' }}>{{--" --}}
                                            <label class="form-check-label" for="gender2">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-2">Checkbox</div>
                                <div class="col-sm-10">
                                    @php $f = ['html','css','php','js']; $d = []; @endphp
                                    @if (isset($form->checkbox))
                                        @foreach ($form->checkbox as $key=>$checkbox)
                                            <?php $d[] = $checkbox;?>
                                                <div class="form-check">
                                                    <input checked value="{{$checkbox}}" name="checkbox[]" class="form-check-input" type="checkbox" id="gridCheck{{$key}}">
                                                    <label class="form-check-label" for="gridCheck{{$key}}">
                                                        {{ucwords($checkbox)}}
                                                    </label>
                                                </div>
                                        @endforeach
                                    @endif
                                    @foreach($f as $b)
                                        @if (! in_array($b,$d))
                                            <div class="form-check">
                                                <input value="{{$b}}" name="checkbox[]" class="form-check-input" type="checkbox" id="gridCheck1">
                                                <label class="form-check-label" for="gridCheck1">
                                                    {{ucwords($b)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="color" class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <input type="color" value="{{$form->color}}" name="color" class="form-control" id="color" placeholder="Color">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{$form->date}}" name="date" class="form-control" id="date" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datetime-local" class="col-sm-2 col-form-label">Datetime Local</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" value="{{$form->local_date}}" name="local_date" class="form-control" id="datetime-local" placeholder="Datetime Local">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="month" class="col-sm-2 col-form-label">Month</label>
                                <div class="col-sm-10">
                                    <input type="month" value="{{$form->month}}" name="month" class="form-control" id="month" placeholder="Month">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">File</label>
                                <div class="col-sm-10">
                                    <input type="file" name="file" class="form-control" id="file" placeholder="File">
                                </div>
                                <img src="/storage/images/{{$form->file}}" alt="" height="50" width="50">
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-sm-2 col-form-label">Time</label>
                                <div class="col-sm-10">
                                    <input value="{{$form->time}}" type="time" name="time" class="form-control" id="time" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="week" class="col-sm-2 col-form-label">Week</label>
                                <div class="col-sm-10">
                                    <input value="{{$form->week}}" type="week" name="week" class="form-control" id="week" placeholder="Week">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning ml-2">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
