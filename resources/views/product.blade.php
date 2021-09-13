@extends('layouts.app')

@section('content')
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        <div>
            <i class="fas fa-check-circle"></i> {{ session('message') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    <div class="container">
        <div class="product-info">
            <div class="row text-center">
                @forelse($products as $product)
                <div class="col-xl-6 col-sm-6 mb-5">
                    <div class="row me-1" style="width: 30rem">
                        <img src="../storage/{{ $product->photo }}" class="card-img-top" alt="armchair">
                    </div>
                </div>
                <div class="col" style="text-align: left">
                    <h1 class="pb-3" >{{ $product->name }}</h1>
                    <hr class="mb-4">
                    <div class="row mb-5">
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Dostępność:</p>
                            <span style="font-size: 12px">pełny magazyn/na wyczerpaniu/ brak w magazynie (ilość sztuk do bazy - {{ $product->amount }})</span>
                        </div>
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Wysyłka w:</p>
                            <span style="font-size: 12px">7 dni roboczych</span>
                        </div>
                        <div class="col">
                            <p class="mb-0" style="font-weight: bold">Koszt dostawy:</p>
                            <span style="font-size: 12px">darmowa od 500 zł</span>
                        </div>
                    </div>
                    <h4>Cena</h4>
                    <h2 class="mb-3" style="font-weight: bold">{{ $product->price }} zł</h2>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group pb-3">
                            <h4>Kolor</h4>
                            <h2 style="font-weight: bold">{{ $product->color }}</h2>
                        </div>
                        <div class="form-group pb-3">
                            <h4>Rozmiar</h4>
                            <h2 style="font-weight: bold">{{ $product->size }}</h2>
                        </div>
                        <div class="form-group pb-3 col-3">
                            <label for="quantity">Ilość</label>
                            <input type="text" class="form-control" id="quantity" value="1" name="quantity" required>
                        </div>
                        @if ($cart->where('id', $product->id)->count())
                            <h3 class="mt-3" style="font-weight: bold; color: rgb(158, 91, 2)">Produkt znajduje się już w koszyku</h3>
                        @else
                        <div class="col-12 pb-3">
                            <button class="btn btn-dark" type="submit">
                                Do koszyka
                                <i class="fas fa-shopping-cart" style="font-size: 1em"></i>
                            </button>
                        </div>
                        @endif
                    </form>
                    <br>
                    <p>Ocena</p>
                    <div class="container">
                        <span id="rateMe1"></span>
                    </div>
                </div>
                <h3>Opis - kolor, waga, kod produktu, producent</h3>
                <br>
                @empty
                    <h1>Brak danego produktu</h1>
                @endforelse
                <h3 class="mt-5 mb-5">Opinie o produkcie</h3>
                <hr>
                @guest
                <h1>Zaloguj się by wystawić opinię</h1>
                @else
                <h5>Wystaw opinię</h5>
                <form style="justify-content: center; text-align: center; display: flex" method="POST" action="/product/rating">
                    @csrf
                    <div class="col-5">
                        <div class="star-rating">
                            <input type="radio" id="5-stars" name="rate" value="5" />
                            <label for="5-stars" class="star">&#9733;</label>
                            <input type="radio" id="4-stars" name="rate" value="4" />
                            <label for="4-stars" class="star">&#9733;</label>
                            <input type="radio" id="3-stars" name="rate" value="3" />
                            <label for="3-stars" class="star">&#9733;</label>
                            <input type="radio" id="2-stars" name="rate" value="2" />
                            <label for="2-stars" class="star">&#9733;</label>
                            <input type="radio" id="1-star" name="rate" value="1" />
                            <label for="1-star" class="star">&#9733;</label>
                        </div>
                        <div class="form-group pt-3">
                            <div class="mb-3">
                                <textarea id="opinion" type="text" class="form-control @error('opinion') is-invalid @enderror" name="opinion"
                                    value="{{ old('opinion') }}" required autofocus>
                                </textarea>
                                @error('opinion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <input type="hidden" id="product_id" name="product_id" value="{{ request()->id }}">
                        </div>
                        <button type="submit" class="btn btn-success">Wyślij opinię</button>
                    </div>
                </form>
                @endguest
            </div>
        </div>
    </div>
    <style>
        .star-rating {
        display:flex;
        flex-direction: row-reverse;
        font-size:2.5em;
        justify-content:center;
        }

        .star-rating input {
        display:none;
        }

        .star-rating label {
        color:#ccc;
        cursor:pointer;
        }

        .star-rating :checked ~ label {
        color:#f90;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label {
        color:#fc0;
        }
        </style>

        <script>
            document.querySelector("#addProductToastBtn").onclick = function() {
            new bootstrap.Toast(document.querySelector('#addProductToast')).show();
            }
        </script>
@endsection
