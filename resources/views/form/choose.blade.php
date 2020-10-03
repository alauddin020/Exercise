@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-2">
        <a  id="" class="btn btn-info mr-2" href="{{route('forms.index')}}" role="button">Data Table Search</a>
        <a  id="" class="btn btn-primary" href="{{route('custom')}}" role="button">Custom Search</a>
    </div>
@endsection
