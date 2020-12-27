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
                <a href="{{ route('todo.show', $t->id) }}"> 
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
        @endforeach
        {{-- <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0"><i class="fa fa-calendar-check-o"></i>24 Dec</h6>
                </div>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #f9e814;"></i></div>
                    <div>
                        <p class="m-0" style="color: rgb(21,21,24);">aktif 2</p>
                        <div class="text-right"><button class="btn btn-warning" type="button"><i class="fa fa-check"></i>Finish</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card shadow mb-4" style="background: rgb(248,249,252);">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0"><i class="fa fa-calendar-check-o"></i>25 Dec</h6>
                </div>
                <div class="card-body" style="margin: 10px;background: #ffffff;">
                    <div class="text-right"><i class="typcn typcn-chevron-right" style="color: #c2c1be;"></i></div>
                    <div>
                        <p class="m-0" style="color: rgb(21,21,24);">aktif 3</p>
                        <div class="text-right"><button class="btn btn-warning" type="button"><i class="fa fa-check"></i>Finish</button></div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

    {{-- @foreach ($stats->stattodos as $t)
        {{$t->name}}
    @endforeach --}}
@endsection