@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('tasks.search')
        @include('tasks.list')    
    @else
        @include('auth.login')
    @endif
@endsection