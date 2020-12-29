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
                <a href="{{ route('todo.create') }}" class="btn btn-primary addBtnToday">+</a>
                @foreach ($todo as $t)
                <a data-toggle="modal" data-target="#modalDetailToDo-{{$t->id}}">
                    <div type="button" class="card-body" style="margin: 10px;background: #ffffff;">
                        <div class="row ml-1 pb-4">
                                <div>
                                    {{-- TASK NAME --}}
                                    <p class="m-0" style="color: rgb(21,21,24);">{{$t->name}}</p>
                                </div>
                                {{-- CHANGE TO IMPORTANT TAG, REF TO GMAIL --}}
                                {{-- IMPORTANT TAG --}}
                                <div class="ml-auto mr-3">
                                    @if ($t->isImportant == true)
                                        <div class="text-right"><i class="fa fa-star" style="color: #f9e814;"></i></div>
                                    @elseif ($t->isImportant == false)
                                        <div class="text-right"><i class="fa fa-star-o" style="color: #d3d3d3;"></i></div>
                                    @endif
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
                <div class="modal fade" id="modalDetailToDo-{{$t->id}}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                @if ($t->category_id == 1)
                                    <p id="category-{{$t->id}}" class="custom-blue">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                                @if ($t->category_id == 2)
                                    <p id="category-{{$t->id}}" class="custom-orange">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                                @if ($t->category_id == 3)
                                    <p id="category-{{$t->id}}" class="custom-red">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                                @if ($t->category_id == 4)
                                    <p id="category-{{$t->id}}" class="custom-green">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                                @if ($t->category_id == 5)
                                    <p id="category-{{$t->id}}" class="custom-purple">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                                <h6 class="font-weight-bold ml-5" id="deadline-{{$t->id}}"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                            <div class="modal-body">
                                <div class="card">
                                        <div class="card-body text-right">
                                            <h4 id="name-{{$t->id}}"class="text-left card-title">{{$t->name}}</h4>
                                            <hr/>
                                            <h6 class="text-left text-muted card-subtitle mb-2">Note:</h6>
                                            <p id="notes-{{$t->id}}" class="text-left card-text">{{$t->notes}}</p>
                                        </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- BUTTONS --> 
                                <a href="{{ route('todo.edit', $t->id) }}">
                                    <button id="editBtn-{{$t->id}}" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                                </a>
                                <button id="deleteBtn-{{$t->id}}" data-toggle="modal" data-target="#deleteModal-{{$t->id}}" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);"></i>Delete</button>
                                @if ($t->isStart != 1)
                                    <button id="startBtn-{{$t->id}}" data-toggle="modal" data-target="#startModal-{{$t->id}}" data-dismiss="modal" class="btn btn-success" type="button"><i class="fa fa-check"></i>Start</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- START MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="startModal-{{$t->id}}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
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
                <div class="modal fade" role="dialog" tabindex="-1" id="deleteModal-{{$t->id}}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
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
                <a href="{{ route('todo.create') }}" class="btn btn-primary addBtnToday">+</a>
                @foreach ($inprog as $i)
                    <div type="button" data-toggle="modal" data-target="#modalDetailInProg-{{$i->id}}" class="card-body" style="margin: 10px;background: #ffffff;">
                        <div class="row ml-1 pb-4">
                                <div>
                                    {{-- TASK NAME --}}
                                    <p class="m-0" style="color: rgb(21,21,24);">{{$i->name}}</p>
                                </div>
                                {{-- CHANGE TO IMPORTANT TAG, REF TO GMAIL --}}
                                {{-- IMPORTANT TAG --}}
                                <div class="ml-auto mr-3">
                                    @if ($i->isImportant == true)
                                        <div class="text-right"><i class="fa fa-star" style="color: #f9e814;"></i></div>
                                    @elseif ($i->isImportant == false)
                                        <div class="text-right"><i class="fa fa-star-o" style="color: #d3d3d3;"></i></div>
                                    @endif
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
                <div class="modal fade" id="modalDetailInProg-{{$i->id}}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                @if ($i->category_id == 1)
                                    <p id="category-{{$i->id}}" class="custom-blue">{{$cats->where('id', $i->category_id)->first()->name}}</p>
                                @endif
                                @if ($i->category_id == 2)
                                    <p id="category-{{$i->id}}" class="custom-orange">{{$cats->where('id', $i->category_id)->first()->name}}</p>
                                @endif
                                @if ($i->category_id == 3)
                                    <p id="category-{{$i->id}}" class="custom-red">{{$cats->where('id', $i->category_id)->first()->name}}</p>
                                @endif
                                @if ($i->category_id == 4)
                                    <p id="category-{{$i->id}}" class="custom-green">{{$cats->where('id', $i->category_id)->first()->name}}</p>
                                @endif
                                @if ($i->category_id == 5)
                                    <p id="category-{{$i->id}}" class="custom-purple">{{$cats->where('id', $i->category_id)->first()->name}}</p>
                                @endif
                                <h6 class="font-weight-bold ml-5" id="deadline-{{$i->id}}"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$i->deadline}}</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                            <div class="modal-body">
                                <div class="card">
                                        <div class="card-body text-right">
                                            <h4 id="name-{{$i->id}}"class="text-left card-title">{{$i->name}}</h4>
                                            <hr/>
                                            <h6 class="text-left text-muted card-subtitle mb-2">Note:</h6>
                                            <p id="notes-{{$i->id}}" class="text-left card-text">{{$i->notes}}</p>
                                        </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- BUTTONS --> 
                                <a href="{{ route('todo.edit', $i->id) }}">
                                    <button id="editBtn-{{$i->id}}" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                                </a>
                                <button id="deleteBtn-{{$i->id}}" data-toggle="modal" data-target="#deleteModal-{{$i->id}}" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);"></i>Delete</button>
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#finishModal-{{$i->id}}" data-dismiss="modal"><i class="fa fa-check"></i>Finish</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- START MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="finishModal-{{$i->id}}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Finish Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <h4 class="text-center"><br>Finish your task?<br><small style="font-size: 15px;">Your task will be set to Finished and you can find it in history tab</small><br></h4>
                                <p></p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('todo.finish', $i->id) }}">
                                    <button class="btn btn-primary" type="button">Yes</button>
                                </a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="deleteModal-{{$i->id}}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
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
                <a href="{{ route('todo.create') }}" class="btn btn-primary addBtnToday">+</a>
                @foreach ($finish as $f)
                <a data-toggle="modal" data-target="#modalDetailFinished-{{$f->id}}">
                    <div type="button" class="card-body" style="margin: 10px;background: #ffffff;">
                        <div class="row ml-1 pb-4">
                                <div>
                                    {{-- TASK NAME --}}
                                    <p class="m-0" style="color: rgb(21,21,24);">{{$f->name}}</p>
                                </div>
                                {{-- CHANGE TO IMPORTANT TAG, REF TO GMAIL --}}
                                {{-- IMPORTANT TAG --}}
                                <div class="ml-auto mr-3">
                                    @if ($f->isImportant == true)
                                        <div class="text-right"><i class="fa fa-star" style="color: #f9e814;"></i></div>
                                    @elseif ($f->isImportant == false)
                                        <div class="text-right"><i class="fa fa-star-o" style="color: #d3d3d3;"></i></div>
                                    @endif
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
                <div class="modal fade" id="modalDetailFinished-{{$f->id}}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                @if ($f->category_id == 1)
                                    <p id="category-{{$f->id}}" class="custom-blue">{{$cats->where('id', $f->category_id)->first()->name}}</p>
                                @endif
                                @if ($f->category_id == 2)
                                    <p id="category-{{$f->id}}" class="custom-orange">{{$cats->where('id', $f->category_id)->first()->name}}</p>
                                @endif
                                @if ($f->category_id == 3)
                                    <p id="category-{{$f->id}}" class="custom-red">{{$cats->where('id', $f->category_id)->first()->name}}</p>
                                @endif
                                @if ($f->category_id == 4)
                                    <p id="category-{{$f->id}}" class="custom-green">{{$cats->where('id', $f->category_id)->first()->name}}</p>
                                @endif
                                @if ($f->category_id == 5)
                                    <p id="category-{{$f->id}}" class="custom-purple">{{$cats->where('id', $f->category_id)->first()->name}}</p>
                                @endif
                                <h6 class="font-weight-bold ml-5" id="deadline-{{$f->id}}"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$f->deadline}}</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                            <div class="modal-body">
                                <div class="card">
                                        <div class="card-body text-right">
                                            <h4 id="name-{{$f->id}}"class="text-left card-title">{{$f->name}}</h4>
                                            <hr/>
                                            <h6 class="text-left text-muted card-subtitle mb-2">Note:</h6>
                                            <p id="notes-{{$f->id}}" class="text-left card-text">{{$f->notes}}</p>
                                        </div>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- BUTTONS --> 
                                <a href="{{ route('todo.edit', $f->id) }}">
                                    <button id="editBtn-{{$f->id}}" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                                </a>
                                <button id="deleteBtn-{{$f->id}}" data-toggle="modal" data-target="#deleteModal-{{$f->id}}" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);"></i>Delete</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE MODAL -->
                <div class="modal fade" role="dialog" tabindex="-1" id="deleteModal-{{$f->id}}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
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
</div>
@endsection