@extends('layouts.homeLayout')

@section('title')
    Active Todo
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-1 pb-3">Active Task</h3>
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
                {{-- <a href="{{ route('todo.show', $t->id) }}">  --}}

                    {{-- BELOW USING MODAL --}}
                    <div type="button" data-toggle="modal" data-target="#modalDetail-{{$t->id}}" class="card-body" style="margin: 10px;background: #ffffff;">
                        <div>
                            <p class="m-0" style="color: rgb(21,21,24);">{{$t->name}}</p>
                                {{-- <div class="text-right">
                                    @if ($t->isStart == 0)
                                    <a href="{{ route('todo.start', $t->id) }}">
                                        <button class="btn btn-warning" type="button"><i class="fa fa-check" data-toggle="modal" data-target="#startModal-{{$t->id}}"></i>Start</button>
                                    </a>
                                    @else
                                    <a href="{{ route('todo.finish', $t->id) }}">
                                        <button class="btn btn-warning" type="button"><i class="fa fa-check"></i>Finish</button>
                                    </a>
                                    @endif
                                </div> --}}
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

        {{-- <input id="hehe" type="hidden" data-id="{{$t->id}}" onclick="getID(this)"> FOR AJAX DOCUM --}}

        {{-- MODAL --}}
        <div class="modal fade " id="modalDetail-{{$t->id}}">
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
                        <a href="{{ route('todo.edit', $t->id) }}">
                            <button id="editBtn-{{$t->id}}" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);"></i>Edit</button>
                        </a>
                        <button id="deleteBtn-{{$t->id}}" data-toggle="modal" data-target="#deleteModal-{{$t->id}}" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash pr-1" style="border-style: none;color: rgb(248,243,204);"></i>Delete</button>
                        @if ($t->isStart == 0)
                            <button id="startBtn-{{$t->id}}" data-toggle="modal" data-target="#startModal-{{$t->id}}" data-dismiss="modal" class="btn btn-success" type="button"><i class="fa fa-check"></i>Start</button>
                        @elseif ($t->isStart == 1)
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#finishModal-{{$t->id}}" data-dismiss="modal"><i class="fa fa-check"></i>Finish</button>
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

        {{-- FINISH MODAL --}}
        <div class="modal fade" role="dialog" tabindex="-1" id="finishModal-{{$t->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Finish Task</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <h4 class="text-center"><br>Finish your task?<br><small style="font-size: 15px;">Your task will be set to Finished and you can find it in history tab</small><br></h4>
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('todo.finish', $t->id) }}">
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

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('#modalDetail').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    // var id;
    // $(function () {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    // });

    // for AJAX DOCUM (DO NOT DELETE)
    // $('a.detail').on('click', function() {
    //     var x = window.id;
    //     $.ajax({
    //         url: "{{ url('ajax') }}",
    //         method: 'GET',
    //         data: {
    //             id: x
    //         },
    //         success: function(data) {
    //             // console.log(data);
    //             document.getElementById('name').innerHTML = data.name;
    //             document.getElementById('notes').innerHTML = data.notes;
    //             document.getElementById('deadline').innerHTML = data.deadline;
    //             if ((data.isStart == 0 && data.isFinished == 1) && (data.isStart == 1)) {
    //                 document.getElementById('startBtn').classList.add('d-none');
    //             }
    //             $.ajax({
    //                 url: "{{ url('getCatName')}}",
    //                 method: 'GET',
    //                 data: {
    //                     cat_id: data.category_id
    //                 },
    //                 success: function(data) {
    //                     document.getElementById('category').innerHTML = data.name;
    //                 }
    //             });
    //         }
    //     });
    // });

    // function getID(i) {
    //     window.id = $(i).attr('data-id');
    // }
</script>
@endsection