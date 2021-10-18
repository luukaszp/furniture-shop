@extends('layouts.app')

@section('content')
<div class="container">
    <div class="items" style="text-align: center; justify-content: center">
        @include('menu')
        <div class="row mt-3 mb-3">
            @isset($products)
            <div class="mb-3" style="text-align: center; justify-content: center;">
                <button class="rounded-pill btn-light" style="text-decoration: none; color:black; border: 1px solid black" onclick="history.back(-1)"><i class="fas fa-arrow-circle-left"></i> Powrót</button>
            </div>
            @forelse($products as $product)
            <div class="col" style="justify-content: center; display: flex">
                <div class="card mb-3" style="width: 18rem; text-align: center">
                    <a href="/product/{{ $product->id }}">
                        <img src="{{ Storage::disk('s3')->url($product->photo) }}" class="card-img-top" alt="armchair">
                    </a>
                    <div class="card-body" style="height: 175px">
                        <h5 class="card-title" style="height: 50px">{{ $product->name }}</h5>
                        <p class="card-text" style="font-weight: bold">{{ $product->price }} zł</p>
                        <a href="/product/{{ $product->id }}" class="btn btn-outline-dark">Zobacz więcej</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align: center">
                <h1>Brak produktów w sklepie</h1>
            </div>
            @endforelse
            @endisset
        </div>
    </div>
</div>
<style>
    .pagination .page-link {
        background: black;
        color: white;
    }

    .page-item.active .page-link {
        background: white;
        color: black;
    }
</style>
@endsection
