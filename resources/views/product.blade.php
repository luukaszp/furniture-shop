@extends('layouts.app')

@section('content')
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
                            <span style="font-size: 12px">darmowa od 150 zł</span>
                        </div>
                    </div>
                    <h4>Cena</h4>
                    <h2 class="mb-3" style="font-weight: bold">{{ $product->price }}</h2>
                    <form>
                        <div class="form-group pb-3">
                            <h4>Kolor</h4>
                            <h2 style="font-weight: bold">{{ $product->color }}</h2>
                        </div>
                        <div class="form-group pb-3">
                            <h4>Rozmiar</h4>
                            <h2 style="font-weight: bold">{{ $product->size }}</h2>
                        </div>
                        <div class="form-group pb-3">
                            <label for="quantityInput">Ilość</label>
                            <input type="quantity" class="form-control" id="quantityInput" value="1" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="deliverySelect">Dostawa</label>
                            <select class="form-control" id="deliverySelect" required>
                                <option value="0">Odbiór osobisty - 0 zł</option>
                                <option value="20">Dostawa kurierem (do 30kg) - 20 zł</option>
                                <option value="50">Dostawa bez wniesienia - 50 zł</option>
                                <option value="80">Dostawa z wniesieniem - 80 zł</option>
                                <option value="100">Dostawa z wniesieniem o wybranej porze dnia - 100 zł</option>
                            </select>
                            <div class="invalid-feedback">
                                Proszę wybrać sposób dostawy.
                            </div>
                        </div>
                        <div class="col-12 pb-3">
                            <button class="btn btn-dark" type="submit">
                                Do koszyka
                                <i class="fas fa-shopping-cart" style="font-size: 1em"></i>
                            </button>
                        </div>
                    </form>
                    <br>
                    <p>Ocena</p>
                    <div class="container">
                        <span id="rateMe1"></span>
                    </div>
                </div>
                <h3>Opis - kolor, waga, kod produktu, producent</h3>
                <br>
                <h3 class="mt-5 mb-5">Opinie o produkcie</h3>
                <form style="justify-content: center; text-align: center; display: flex" method="POST" action="/product/rating">
                    @csrf
                    <div class="col-5">
                        <div class="star-rating mb-2">
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="star">&#9733;</label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="star">&#9733;</label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="star">&#9733;</label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="star">&#9733;</label>
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="star">&#9733;</label>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Pozostaw swoją opinię" id="opinion" style="height: 100px"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Wyślij opinię</button>
                    </div>
                </form>
                @empty
                    <h1>Brak danego produktu</h1>
                @endforelse
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
@endsection
