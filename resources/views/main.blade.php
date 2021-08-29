@extends('layouts.app')

@section('content')
    <div class="container" style="display: flex; justify-content: center">
        <div id="carousel-furniture" class="carousel slide" data-bs-ride="carousel" style="width: 850px">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/rooms/bathroom.jpg" class="d-block w-100" alt="bathroom">
                </div>
                <div class="carousel-item">
                    <img src="/images/rooms/bedroom.jpg" class="d-block w-100" alt="bedroom">
                </div>
                <div class="carousel-item">
                    <img src="/images/rooms/kids_room.jpg" class="d-block w-100" alt="kids_room">
                </div>
                <div class="carousel-item">
                    <img src="/images/rooms/kitchen.jpg" class="d-block w-100" alt="kitchen">
                </div>
                <div class="carousel-item">
                    <img src="/images/rooms/living_room.jpg" class="d-block w-100" alt="living_room">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-furniture" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-furniture" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
