@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger col-6" style="text-align: center">
        <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        <ul>
            @foreach ($errors->all() as $error)
            <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">Dodawanie produktu</div>

                <div class="card-body">
                    <form method="POST" action="/product/store" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row pt-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa produktu</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="subcategory" class="col-md-4 col-form-label text-md-right">Podkategoria</label>

                            <div class="col-md-6">
                                <select class="form-select" id="subcategory" type="text" aria-label=".form-select" name="subcategory" value="{{ old('subcategory') }}" required autocomplete="subcategory">
                                    @forelse($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @empty
                                        <option>Brak danych</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Cena</label>

                            <div class="col-md-6">
                                <input id="address" type="number" class="form-control" name="price" step="any" value="{{ old('price') }}" required autocomplete="price">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="color"
                                class="col-md-4 col-form-label text-md-right">Kolor</label>

                            <div class="col-md-6">
                                <input id="color" type="text"
                                    class="form-control" name="color"
                                    value="{{ old('color') }}" required autocomplete="color">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="amount"
                                class="col-md-4 col-form-label text-md-right">Ilość</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" step="any" value="{{ old('amount') }}" required autocomplete="amount">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="size" class="col-md-4 col-form-label text-md-right">Rozmiar</label>

                            <div class="col-md-6">
                                <select class="form-select" id="size" type="text" aria-label=".form-select" name="size" value="{{ old('size') }}" required autocomplete="size">
                                    <option selected value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="code_product"
                                class="col-md-4 col-form-label text-md-right">Kod produktu</label>

                            <div class="col-md-6">
                                <input id="code_product" type="text" placeholder="(product-color-number KRZ-CZA-3)"
                                    class="form-control" name="code_product"
                                    value="{{ old('code_product') }}" required autocomplete="code_product">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">Waga</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" class="form-control" name="weight"
                                    step="any" value="{{ old('weight') }}" required autocomplete="weight">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Opis produktu</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="photo" class="col-md-4 col-form-label form-label">Zdjęcie produktu</label>
                            <div class="col-md-6">
                                <label for="file-upload" class="custom-file-upload" style="width: 200px">
                                    <i class="fas fa-cloud-upload-alt"></i> Wgraj zdjęcie
                                </label>
                                <input class="form-control" type="file" id="file-upload" name="photo">
                            </div>
                        </div>

                        <div class="form-group row mb-0 pt-3">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    Dodaj produkt
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ced4da;
        padding: 6px 12px;
        cursor: pointer;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    ul {
    list-style-type: none;
    }
</style>
@endsection
