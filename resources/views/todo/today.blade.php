@extends('layouts.homeLayout')

@section('title')
    Todo Active
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Today Dashboard</h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">To Do</h6><span class="border rounded">&nbsp;{{$todo->count()}}&nbsp;</span>
                </div>
                <a href="{{ route('todo.create') }}">
                    {{-- TODO FIX ADD BUTTON, STOP WORKING AFTER ADDING <a> --}}
                    <button class="btn btn-primary addBtnToday" type="button">+</button>
                </a>
                @foreach ($todo as $t)
                <a href="{{ route('todo.show', $t->id) }}">
                    <div class="card-body" style="margin: 10px;background: #ffffff;">
                        <div class="row ml-1 pb-4">
                                <div>
                                    {{-- TASK NAME --}}
                                    <p class="m-0" style="color: rgb(21,21,24);">{{$t->name}}</p>
                                </div>
                                {{-- CHANGE TO IMPORTANT TAG, REF TO GMAIL --}}
                                {{-- IMPORTANT TAG --}}
                                <div class="ml-auto mr-3">
                                    <i class="typcn typcn-chevron-right" style="color: #f9e814;"></i>
                                </div>
                        </div>
                        <div class="row ml-1">
                            <div>
                                {{-- CATEGORY TAG --}}
                                <p>{{$cats->where('id', $t->category_id)->first()->name}}</p>
                            </div>
                            <div class="ml-auto mr-3 row">
                                {{-- DEADLINE TAG --}}
                                <i class="fa fa-calendar-check-o pt-1 pr-2"></i>
                                <p>{{ $t->deadline }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">In Progress</h6><span class="border rounded">&nbsp;{{$inprog->count()}}&nbsp;</span>
                </div>
                <button class="btn btn-primary addBtnToday" type="button">+</button>
                @foreach ($inprog as $i)
                <a href="{{ route('todo.show', $i->id) }}">
                    <div class="card-body" style="margin: 10px;background: #ffffff;">
                        <div class="row ml-1 pb-4">
                                <div>
                                    {{-- TASK NAME --}}
                                    <p class="m-0" style="color: rgb(21,21,24);">{{$i->name}}</p>
                                </div>
                                {{-- CHANGE TO IMPORTANT TAG, REF TO GMAIL --}}
                                {{-- IMPORTANT TAG --}}
                                <div class="ml-auto mr-3">
                                    <i class="typcn typcn-chevron-right" style="color: #f9e814;"></i>
                                </div>
                        </div>
                        <div class="row ml-1">
                            <div>
                                {{-- CATEGORY TAG --}}
                                <p>{{$cats->where('id', $i->category_id)->first()->name}}</p>
                            </div>
                            <div class="ml-auto mr-3 row">
                                {{-- DEADLINE TAG --}}
                                <i class="fa fa-calendar-check-o pt-1 pr-2"></i>
                                <p>{{ $i->deadline }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">Finished</h6><span class="border rounded">&nbsp;{{$finish->count()}}&nbsp;</span>
                </div>
                <button class="btn btn-primary addBtnToday" type="button">+</button>
                @foreach ($finish as $f)
                <a href="{{ route('todo.show', $f->id) }}">
                    <div class="card-body" style="margin: 10px;background: #ffffff;">
                        <div class="row ml-1 pb-4">
                                <div>
                                    {{-- TASK NAME --}}
                                    <p class="m-0" style="color: rgb(21,21,24);">{{$f->name}}</p>
                                </div>
                                {{-- CHANGE TO IMPORTANT TAG, REF TO GMAIL --}}
                                {{-- IMPORTANT TAG --}}
                                <div class="ml-auto mr-3">
                                    <i class="typcn typcn-chevron-right" style="color: #f9e814;"></i>
                                </div>
                        </div>
                        <div class="row ml-1">
                            <div>
                                {{-- CATEGORY TAG --}}
                                <p>{{$cats->where('id', $f->category_id)->first()->name}}</p>
                            </div>
                            <div class="ml-auto mr-3 row">
                                {{-- DEADLINE TAG --}}
                                <i class="fa fa-calendar-check-o pt-1 pr-2"></i>
                                <p>{{ $f->deadline }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection