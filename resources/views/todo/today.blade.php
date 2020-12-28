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
                <a data-toggle="modal" data-target="#modalDetailToDo">
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

                {{-- MODAL --}}
                <div class="modal" id="modalDetailToDo">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <p id="category">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                <h6 class="font-weight-bold ml-5" id="deadline"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                            <div class="modal-body">
                                <div class="card">
                                        <div class="card-body text-right">
                                            <h4 id="name"class="text-left card-title">{{$t->name}}</h4>
                                            <hr/>
                                            <h6 class="text-left text-muted card-subtitle mb-2">Note:</h6>
                                            <p id="notes" class="text-left card-text">{{$t->notes}}</p>
                                        </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- BUTTONS --> 
                                <a href="{{ route('todo.edit', $t->id) }}">
                                    <button id="editBtn" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                                </a>
                                <button id="deleteBtn" data-toggle="modal" data-target="#deleteModal" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);"></i>Delete</button>
                                @if ($t->isStart != 1)
                                    <button id="startBtn" data-toggle="modal" data-target="#startModal" data-dismiss="modal" class="btn btn-success" type="button"><i class="fa fa-check"></i>Start</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- START MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="startModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Start Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Ready to start your task?<br><small style="font-size: 15px;">Your task will start now</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.start', $t->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="deleteModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Are you sure to delete task?<br><small style="font-size: 15px;">Your task will be deleted</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.delete', $t->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div type="button" data-toggle="modal" data-target="#modalDetailInProg" class="card-body" style="margin: 10px;background: #ffffff;">
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

                {{-- MODAL --}}
                <div class="modal" id="modalDetailInProg">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <p id="category">{{$cats->where('id', $i->category_id)->first()->name}}</p>
                                <h6 class="font-weight-bold ml-5" id="deadline"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$i->deadline}}</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                            <div class="modal-body">
                                <div class="card">
                                        <div class="card-body text-right">
                                            <h4 id="name"class="text-left card-title">{{$i->name}}</h4>
                                            <hr/>
                                            <h6 class="text-left text-muted card-subtitle mb-2">Note:</h6>
                                            <p id="notes" class="text-left card-text">{{$i->notes}}</p>
                                        </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- BUTTONS --> 
                                <a href="{{ route('todo.edit', $i->id) }}">
                                    <button id="editBtn" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                                </a>
                                <button id="deleteBtn" data-toggle="modal" data-target="#deleteModal" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);"></i>Delete</button>
                                <a href="{{ route('todo.finish', $i->id) }}">
                                    <button class="btn btn-success" type="button"><i class="fa fa-check"></i>Finish</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- START MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="startModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Start Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Ready to start your task?<br><small style="font-size: 15px;">Your task will start now</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.start', $i->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="deleteModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Are you sure to delete task?<br><small style="font-size: 15px;">Your task will be deleted</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.delete', $i->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                <a data-toggle="modal" data-target="#modalDetailFinished">
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

                {{-- MODAL --}}
                <div class="modal" id="modalDetailFinished">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <p id="category">{{$cats->where('id', $f->category_id)->first()->name}}</p>
                                <h6 class="font-weight-bold ml-5" id="deadline"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$f->deadline}}</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                            <div class="modal-body">
                                <div class="card">
                                        <div class="card-body text-right">
                                            <h4 id="name"class="text-left card-title">{{$f->name}}</h4>
                                            <hr/>
                                            <h6 class="text-left text-muted card-subtitle mb-2">Note:</h6>
                                            <p id="notes" class="text-left card-text">{{$f->notes}}</p>
                                        </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- BUTTONS --> 
                                <a href="{{ route('todo.edit', $f->id) }}">
                                    <button id="editBtn" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                                </a>
                                <button id="deleteBtn" data-toggle="modal" data-target="#deleteModal" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);"></i>Delete</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- START MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="startModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Start Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Ready to start your task?<br><small style="font-size: 15px;">Your task will start now</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.start', $f->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="deleteModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Are you sure to delete task?<br><small style="font-size: 15px;">Your task will be deleted</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.delete', $f->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection