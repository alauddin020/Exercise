@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-5">
        <a class="btn btn-outline-success" href="{{route('custom')}}" role="button">Custom Search</a>
        <a class="btn btn-outline-primary ml-2" href="{{route('forms.index')}}" role="button">Data Table Search</a>
    </div>
@endsection
