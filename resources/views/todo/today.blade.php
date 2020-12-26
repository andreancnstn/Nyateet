@extends('layouts.homeLayout')

@section('title')
    Todo Active
@endsection

@section('content')
    TODAY <br>

    @foreach ($todos as $t)
        id = {{$t->id}} <br>
        name = {{$t->name}} <br>
    @endforeach
@endsection