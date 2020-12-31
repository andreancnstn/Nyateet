@extends('layouts.homeLayout')

@section('title')
    History
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-1 pb-3">History</h3>
    <div class="row">
        @foreach ($todos as $t)
        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    @if ($t->deadline != null)
                        <h6 class="text-primary font-weight-bold m-0"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                    @endif
                    {{-- MUSTINYA PAKE KEK RIBBON KUNING KLO IMPORTANT -> CONTOH LIAT GMAIL --}}
                    @if ($t->isImportant == true)
                        <div class="text-right"><i class="fa fa-star" style="color: #f9e814;"></i></div>
                    @elseif ($t->isImportant == false)
                        <div class="text-right"><i class="fa fa-star-o" style="color: #d3d3d3;"></i></div>
                    @endif
                </div>
                {{-- TODO MAKE DETAIL MODAL PAGE --}}
                    <div type="button" data-toggle="modal" data-target="#modalDetail-{{$t->id}}" class="card-body" style="margin: 10px;background: #ffffff;">
                        <div>
                            <p class="m-0" style="color: rgb(21,21,24);">{{$t->name}}</p>
                        </div>
                        <div>
                            {{-- BUAT CATEGORYNYA , CTH LIAT FIGMA (KLO GK BISA UBAH UBAH WRNANYA, BUAT AJA CLASSNYA OR TEMPLATENYA) --}}
                            <div>
                                {{-- CATEGORY TAG --}}
                                @if ($t->category_id != null)
                                <p>{{$cats->where('id', $t->category_id)->first()->name}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        {{-- MODAL --}}
        <div class="modal fade" id="modalDetail-{{$t->id}}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header align-items-center">
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
                        </div>
                        <div class="mx-auto pt-3">
                            @if ($t->deadline != null)
                                <h6 class="fnt-weight-bold ml-5" id="deadline-{{$t->id}}"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                            @endif
                        </div>
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
                        {{-- <a href="{{ route('todo.edit', $t->id) }}">
                            <button id="editBtn" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                        </a> --}}
                        <button id="deleteBtn" data-toggle="modal" data-target="#deleteModal-{{$t->id}}" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash pr-1" style="border-style: none;color: rgb(248,243,204);"></i>Delete</button>
                    </div>
                </div>
            </div>
        </div>

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
@endsection