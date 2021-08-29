@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="product-info">
            <div class="row text-center">
                <div class="col-xl-6 col-sm-6 mb-5">
                    <div class="row me-1" style="width: 30rem">
                        <img src="/images/furniture/armchair.jpg" class="card-img-top" alt="armchair">
                    </div>
                </div>
                <div class="col" style="text-align: left">
                    <h1 class="pb-3">Fotel skórzany</h1>
                    <div class="row mb-5">
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Dostępność:</p>
                            <span style="font-size: 12px">pełny magazyn/na wyczerpaniu/ brak w magazynie (ilość sztuk do bazy)</span>
                        </div>
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Wysyłka w:</p>
                            <span style="font-size: 12px">7 dni roboczych</span>
                        </div>
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Dostawa:</p>
                            <span style="font-size: 12px">darmowa/kurier</span>
                        </div>
                    </div>
                    <h4>Cena:</h4>
                    <h2 class="mb-3" style="font-weight: bold">59,00 zł</h2>
                    <form>
                        <div class="form-group pb-3">
                            <label for="colorSelect">Kolor</label>
                            <select class="form-control" id="colorSelect" required>
                            <option>Kremowy</option>
                            <option>Czarny</option>
                            <option>Zielony</option>
                            <option>Fioletowy</option>
                            <option>Żółty</option>
                            <option>Czerwony</option>
                            <option>Szary</option>
                            </select>
                            <div class="invalid-feedback">
                                Proszę wybrać kolor.
                            </div>
                        </div>
                        <div class="form-group pb-3">
                            <label for="sizeSelect">Rozmiar</label>
                            <select class="form-control" id="sizeSelect" required>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            </select>
                            <div class="invalid-feedback">
                                Proszę wybrać rozmiar.
                            </div>
                        </div>
                        <div class="form-group pb-3">
                            <label for="quantityInput">Ilość</label>
                            <input type="quantity" class="form-control" id="quantityInput" value="1" required>
                        </div>
                        <div class="col-12 pb-3">
                            <button class="btn btn-dark" type="submit">
                                Do koszyka
                                <i class="fas fa-shopping-cart" style="font-size: 1em"></i>
                            </button>
                        </div>
                    </form>
                    <br>
                    <p>TU RAMKA</p>
                    <p>Ocena</p>
                    <p>Producent</p>
                    <p>Kod produktu</p>
                </div>
                <h3>Opis</h3>
                <br>
                <h3>Opinie o produkcie</h3>
            </div>
        </div>
    </div>
@endsection
