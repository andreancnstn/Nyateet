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
                    <h6 class="text-primary font-weight-bold m-0"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                    {{-- MUSTINYA PAKE KEK RIBBON KUNING KLO IMPORTANT -> CONTOH LIAT GMAIL --}}
                    @if ($t->isImportant == true)
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #f9e814;"></i></div>  
                    @endif
                    @if ($t->isImportant == false)
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #d3d3d3;"></i></div>
                    @endif
                   </div>
                {{-- TODO MAKE DETAIL MODAL PAGE --}}
                {{-- <a href="{{ route('todo.show', $t->id) }}">  --}}

                    {{-- BELOW USING MODAL --}}
                <a class="detail" type="button" data-toggle="modal" data-target="#modalDetail" data-id="{{$t->id}}" onclick="getID(this)"> 
                    <div class="card-body" style="margin: 10px;background: #ffffff;">
                        <div>
                            <p class="m-0" style="color: rgb(21,21,24);">{{$t->name}}</p>

                            {{-- BAGUSAN TARO FINISH BUTTON OR START DI DETAIL AJA BIAR SERAGAM --}}
                            {{-- <div class="text-right"><button class="btn btn-warning" type="button"><i class="fa fa-check"></i>Finish</button></div> --}}
                        </div>
                        <div>
                            {{-- BUAT CATEGORYNYA , CTH LIAT FIGMA (KLO GK BISA UBAH UBAH WRNANYA, BUAT AJA CLASSNYA OR TEMPLATENYA) --}}
                            <p class="btn">{{$cats->where('id', $t->category_id)->first()->name}}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- <input id="hehe" type="hidden" data-id="{{$t->id}}" onclick="getID(this)"> FOR AJAX DOCUM --}}

        {{-- MODAL --}}
        <div class="modal" id="modalDetail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="category" style="background-color: #cbcef5; border-radius: 20px; padding-right: 5%; padding-left: 5%">
                            <h6 id="category" style="color: #4e73df; padding-top: 10%;">{{$cats->where('id', $t->category_id)->first()->name}}</h6>
                        </div>
                        <div class="d-flex" style="padding-left: 5%">
                            @if ($t->isImportant == true)
                                <h6 class="font-weight-bold ml-5" id="deadline"><i class="fa fa-calendar-check-o" style="text-align: center; color: #f9e814;"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>     
                            @endif
                            @if($t->isImportant == false)
                                <h6 class="font-weight-bold ml-5" id="deadline"><i class="fa fa-calendar-check-o" style="text-align: center"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                            @endif
                             </div>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    
                    <!-- Modal body TODO check udah sesuai belom tampilannya & route the buttons--> 
                    <div class="modal-body">
                                    <div class="taskName rounded" style="background-color: #d3d3d3; padding: 3px;">
                                        <h4 id="name"class="text-left text-dark card-title" style=" padding-top: 10px;">{{$t->name}}</h4>
                                    </div>
                                    <br>
                                    <div class="taskDesc rounded" style="background-color: #d3d3d3; padding: 3px; padding-bottom: 30px">
                                        <h6 class="text-left text-muted card-subtitle mb-2" style="padding-top: 5px">Notes</h6>
                                        <hr class="divide" style="border: 2px solid text-muted;">
                                        <p id="notes" class="text-left text-dark card-text" style="line-height: 80%">{{$t->notes}}</p>    
                                    </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- BUTTONS --> 
                            <a href="{{ route('todo.edit', $t->id) }}">
                                <button id="editBtn" class="btn btn-warning" type="button"><i class="fa fa-pencil" style="border-style: none;color: rgb(248,243,204);width: 30px"></i>Edit</button>
                            </a>
                            
                                <button id="deleteBtn" data-toggle="modal" data-target="#deleteModal" data-dismiss="modal" class="btn btn-danger" type="button"><i class="fa fa-trash" style="color: rgb(0,0,0);width: 30px"></i>Delete</button>    
                        

                            {{-- pindah ke detail --}}
                            {{-- <button id="startBtn" data-toggle="modal" data-target="#startModal" data-dismiss="modal" class="btn btn-success" type="button"><i class="fa fa-check"></i>Start</button> --}}
                        
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