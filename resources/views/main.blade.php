@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="carousel" style="display: flex; justify-content: center">
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
                    <span class="visually-hidden">Poprzedni</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-furniture" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Następny</span>
                </button>
            </div>
        </div>
        <div class="items" style="text-align: center; justify-content: center">
            <h2 class="pt-5 pb-3">Produkty</h2>
            <div class="row mt-3 mb-3" style="display: inline-flex">
                @forelse($products as $product)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <a href="/product/{{ $product->id }}">
                            <img src="../storage/{{ $product->photo }}" class="card-img-top" alt="armchair">
                        </a>
                        <div class="card-body" style="height: 175px">
                            <h5 class="card-title" style="height: 50px">{{ $product->name }}</h5>
                            <p class="card-text" style="font-weight: bold">{{ $product->price }}</p>
                            <a href="#" class="btn btn-outline-dark">Dodaj do koszyka</a>
                        </div>
                    </div>
                </div>
                @empty
                <div>
                    <h1>Brak produktów w sklepie</h1>
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
