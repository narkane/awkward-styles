@extends('layouts.dashboard')

@section('content')

    <div id="app">
        <comingsoon />
    </div>

@endsection

@if (Request::path() == 'list')


@endif