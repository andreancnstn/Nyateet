@extends('layouts.homeLayout')

@section('title')
    History
@endsection

@section('content')
    hai ini adalah page HISTORY

    {{-- @foreach ($active->todos() as $todo)
        {{$todo->name}}
    @endforeach --}}

    @foreach ($stats->stattodos as $t)
        {{$t->name}}
    @endforeach
@endsection