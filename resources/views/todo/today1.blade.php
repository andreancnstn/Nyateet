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
                    <h6 class="text-primary font-weight-bold m-0">To Do</h6>
                    <span class="border rounded">&nbsp;{{$todo->count()}}&nbsp;</span>
                </div>
                <a href="{{ route('todo.create') }}" class="btn btn-primary addBtnToday" type="button" >+</a>
                @foreach ($todo as $t)
                    <a type="button" class="card-body card-body-colorbg" data-toggle="modal" data-target="#modalDetailToDo-{{$t->id}}">
                        <div class="row ml-1 pb-4">
                            <div>
                                {{-- TASK NAME --}}
                                <p class="m-0 custom-black">{{$t->name}}</p>
                            </div>
                            {{-- IMPORTANT TAG --}}
                            <div class="ml-auto mr-3">
                                @if ($t->isImportant == true)
                                    <div class="text-right"><i class="fa fa-star custom-yellow"></i></div>
                                @elseif ($t->isImportant == false)
                                    <div class="text-right"><i class="fa fa-star-o custom-gray"></i></div>
                                @endif
                            </div>
                        </div>
                        <div class="row ml-1">
                            <div>
                                {{-- CATEGORY TAG --}}
                                @if (!empty($t->category_id))
                                <p>{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                            </div>
                            <div class="ml-auto mr-3 row">
                                {{-- DEADLINE TAG --}}
                                @if ($t->deadline != null)
                                <i class="fa fa-calendar-check-o pt-1 pr-2"></i>
                                @endif
                                <p>{{ $t->deadline }}</p>
                            </div>
                        </div>
                    </a>

                    {{-- MODAL --}}
                    <div class="modal fade" id="modalDetailToDo-{{$t->id}}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header align-items-center">
                                    @if(!empty($t->category_id))
                                    <div class="pt-3">
                                        <p id="category-{{$t->id}}" @if ($t->category_id == 1)
                                            class="custom-blue"
                                        @elseif ($t->category_id == 2)
                                            class="custom-orange"
                                        @elseif ($t->category_id == 3)
                                            class="custom-red"
                                        @elseif ($t->category_id == 4)
                                            class="custom-green"
                                        @elseif ($t->category_id == 5)
                                            class="custom-purple"
                                        @endif>{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                    </div>@endif
                                    <div class="mx-auto pt-3 d-flex">
                                        @if ($t->deadline != null)
                                        <h6 class="fnt-weight-bold ml-5 pr-3 pt-1" id="deadline-{{$t->id}}"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                                        @endif
                                        @if ($t->isImportant == true)
                                            <div class="text-right"><i class="fa fa-star custom-yellow"></i></div>
                                        @else
                                            <div class="text-right"><i class="fa fa-star custom-gray"></i></div>
                                        @endif
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body --> 
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
                                        <button id="editBtn-{{$t->id}}" class="btn btn-warning" type="button"><i class="fa fa-pencil modal-btn-style"></i>Edit</button>
                                    </a>
                                    <button id="deleteBtn-{{$t->id}}"  data-toggle="modal" data-target="#deleteModal-{{$t->id}}" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash pr-1 modal-btn-style"></i>Delete</button>
                                    @if ($t->isStart != 1)
                                        <button id="startBtn-{{$t->id}}" data-toggle="modal" data-target="#startModal-{{$t->id}}" data-dismiss="modal" class="btn btn-success" type="button"><i class="fa fa-check"></i>Start</button>
                                    @endif
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
                    <h6 class="text-primary font-weight-bold m-0">In Progress</h6><span class="border rounded">&nbsp;3&nbsp;</span></div><button class="btn btn-primary addBtnToday" type="button" >+</button>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #f9e814;"></i></div>
                    <p class="m-0" style="color: rgb(21,21,24);">Create Prototype blablablabla lalalala</p>
                </div>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #c2c1be;"></i></div>
                    <p class="m-0" style="color: rgb(21,21,24);">Create Prototype blablablabla lalalala</p>
                </div>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #c2c1be;"></i></div>
                    <p class="m-0" style="color: rgb(21,21,24);">Create Prototype blablablabla lalalala</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">Finished</h6><span class="border rounded">&nbsp;3&nbsp;</span></div><button class="btn btn-primary addBtnToday" type="button" >+</button>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #f9e814;"></i></div>
                    <p class="m-0" style="color: rgb(21,21,24);">Create Prototype blablablabla lalalala</p>
                </div>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #c2c1be;"></i></div>
                    <p class="m-0" style="color: rgb(21,21,24);">Create Prototype blablablabla lalalala</p>
                </div>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #c2c1be;"></i></div>
                    <p class="m-0" style="color: rgb(21,21,24);">Create Prototype blablablabla lalalala</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection