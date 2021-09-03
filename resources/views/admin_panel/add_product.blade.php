@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">{{ __('Dodawanie produktu') }}</div>

                <div class="card-body">
                    <form method="POST" action="/product/store" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row pt-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nazwa produktu') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Kategoria') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" id="category" type="text" aria-label=".form-select" @error('category')
                                    is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">
                                    <option selected value="Meble kuchenne">Meble kuchenne</option>
                                    <option value="Meble łazienkowe">Meble łazienkowe</option>
                                    <option value="Akcesoria i dekoracje">Akcesoria i dekoracje</option>
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="subcategory" class="col-md-4 col-form-label text-md-right">{{ __('Podkategoria') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" id="subcategory" type="text" aria-label=".form-select" @error('subcategory')
                                    is-invalid @enderror" name="subcategory" value="{{ old('subcategory') }}" required autocomplete="subcategory">
                                    <option selected value="Szafki kuchenne">Szafki kuchenne</option>
                                    <option value="Blaty kuchenne">Blaty kuchenne</option>
                                    <option value="Stoły kuchenne">Stoły kuchenne</option>
                                </select>
                                @error('subcategory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Cena') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="color"
                                class="col-md-4 col-form-label text-md-right">{{ __('Kolor') }}</label>

                            <div class="col-md-6">
                                <input id="color" type="text"
                                    class="form-control @error('color') is-invalid @enderror" name="color"
                                    value="{{ old('color') }}" required autocomplete="color">

                                @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="amount"
                                class="col-md-4 col-form-label text-md-right">{{ __('Ilość') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror"
                                    name="amount" value="{{ old('amount') }}" required autocomplete="amount">

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Rozmiar') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" id="size" type="text" aria-label=".form-select" @error('size') is-invalid
                                    @enderror" name="size" value="{{ old('size') }}" required autocomplete="size">
                                    <option selected value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                @error('size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="product_code"
                                class="col-md-4 col-form-label text-md-right">{{ __('Kod produktu') }}</label>

                            <div class="col-md-6">
                                <input id="product_code" type="text" placeholder="(krzeslo-kolor-numer=KRZ-CZA-3)"
                                    class="form-control @error('product_code') is-invalid @enderror" name="product_code"
                                    value="{{ old('product_code') }}" required autocomplete="product_code">

                                @error('product_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Waga') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                                    value="{{ old('weight') }}" required autocomplete="weight">

                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="formFile" class="col-md-4 col-form-label form-label">Zdjęcie produktu</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>

                        <div class="form-group row mb-0 pt-3">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Dodaj produkt') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
