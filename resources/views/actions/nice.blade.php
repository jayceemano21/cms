@extends('layouts.master')

@section('content')
    <div class="centered">
        <a href="{{ route('home') }}">Go to Home</a>
            <h1>Hello! {{ $action }} Human {{ $name }}</h1>
    </div>
@endsection