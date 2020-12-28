@extends('layouts.homeLayout')

@section('title')
    Active Todo
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-1 pb-3">Active Task</h3>
    <div class="row">
        @foreach ($stats->stattodos as $t)
        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$t->deadline}}</h6>
                    {{-- MUSTINYA PAKE KEK RIBBON KUNING KLO IMPORTANT -> CONTOH LIAT GMAIL --}}
                    {{-- <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #f9e814;"></i></div>  --}}
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
        <input id="hehe" type="hidden" data-id="{{$t->id}}" onclick="getID(this)">
        @endforeach
    </div>
</div>

{{-- MODAL EXAMPLE --}}
<div class="modal" id="modalDetail">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p id="category"></p>
                <h6 class="font-weight-bold ml-5" id="deadline"><i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body TODO FIX MODAL BODY--> 
            <div class="modal-body">
                <div class="card-body rounded mb-4" style="background-color : gray; color: white">
                    <h3 id="name"></h3>
                </div>

                <div class="card-body rounded" style="background-color : gray; color: white">
                    <p><strong>Notes</strong></p>
                    <hr style="background-color: white">
                    <p id="notes"></p>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var id;
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#modalDetail').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    $('a.detail').on('click', function() {
        var x = window.id;
        $.ajax({
            url: "{{ url('ajax') }}",
            method: 'GET',
            data: {
                id: x
            },
            success: function(data) {
                // console.log(data);
                document.getElementById('name').innerHTML = data.name;
                document.getElementById('notes').innerHTML = data.notes;
                document.getElementById('deadline').innerHTML = data.deadline;
                $.ajax({
                    url: "{{ url('getCatName')}}",
                    method: 'GET',
                    data: {
                        cat_id: data.category_id
                    },
                    success: function(data) {
                        document.getElementById('category').innerHTML = data.name;
                    }
                });
            }
        });
    });

    function getID(i) {
        window.id = $(i).attr('data-id');
    }
</script>
@endsection