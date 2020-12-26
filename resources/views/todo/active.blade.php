@extends('layouts.homeLayout')

@section('title')
    Active Todo
@endsection

@section('content')
    hai ini adalah page active

    {{-- @foreach ($active->todos() as $todo)
        {{$todo->name}}
    @endforeach --}}

    @foreach ($stats->stattodos as $t)
        {{$t->name}}
    @endforeach
@endsection