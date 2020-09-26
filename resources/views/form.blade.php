@extends('layouts.app')
@section('content')
    <div class="container-lg" style="padding-left: 0;padding-right: 0">
        <form method="POST" action="{{route('forms.store')}}">
            <div class="card">
                <div class="card-header"><strong>Form All Element</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group row">
                                <label for="text" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="number" class="form-control" id="number" placeholder="Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="select" class="col-sm-2 col-form-label">Select</label>
                                <div class="col-sm-10">
                                    <select name="select" id="select" class="form-control">
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="select" class="col-sm-2 col-form-label">Multi Select</label>
                                <div class="col-sm-10">
                                    <select multiple name="multi_select" id="select" class="form-control">
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="textarea" class="col-sm-2 col-form-label">Textarea</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="textarea" name="textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Radio</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio" id="gender1" value="male" checked>
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio" id="gender2" value="female">
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
                                    <div class="form-check">
                                        <input value="html" name="checkbox[]" class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            HTML
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="css" name="checkbox[]" class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            CSS
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="php" name="checkbox[]" class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            PHP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="js" name="checkbox[]" class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Javascript
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="color" class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <input type="color" name="color" class="form-control" id="color" placeholder="Color">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datetime-local" class="col-sm-2 col-form-label">Datetime Local</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="datetime-local" class="form-control" id="datetime-local" placeholder="Datetime Local">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="month" class="col-sm-2 col-form-label">Month</label>
                                <div class="col-sm-10">
                                    <input type="month" name="month" class="form-control" id="month" placeholder="Month">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">File</label>
                                <div class="col-sm-10">
                                    <input type="file" name="file" class="form-control" id="file" placeholder="File">
                                </div>
                            </div>
                            {{--                            <div class="form-group row">--}}
                            {{--                                <label for="image" class="col-sm-2 col-form-label">Image</label>--}}
                            {{--                                <div class="col-sm-10">--}}
                            {{--                                    <input alt="" type="image" name="image" class="form-control" id="image" placeholder="File">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="form-group row">
                                <label for="time" class="col-sm-2 col-form-label">Time</label>
                                <div class="col-sm-10">
                                    <input type="time" name="time" class="form-control" id="time" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="week" class="col-sm-2 col-form-label">Week</label>
                                <div class="col-sm-10">
                                    <input type="week" name="week" class="form-control" id="week" placeholder="Week">
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
