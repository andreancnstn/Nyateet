@extends('layouts.homeLayout')

@section('title')
    
@endsection

@section('content')
    ini page today

    @foreach ($stats->stattodos as $t)
    {{-- BUAT LAYOUT NYA DULU TRUS MASUKIN KE DALEM IF BUAT PISAHIN TODO, INPROGRESS, SAMA FINISHED. 
        LOGIC LIAT DI CONTROLLER  --}}
        {{$t->name}}
    @endforeach
@endsection