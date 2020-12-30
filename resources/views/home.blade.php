@extends('layouts.homeLayout')

@section('content')
    <div class="container-md">
        <div id="myCarousel" class="carousel slide img-fluid" data-interval="3000" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/wallpaper/wall1inv.png" alt="First Slide">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/wallpaper/wall2inv.png" alt="Second Slide">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/wallpaper/wall3inv.png" alt="Third Slide">
                </div>
            </div>
        </div>
    </div>

    
@endsection