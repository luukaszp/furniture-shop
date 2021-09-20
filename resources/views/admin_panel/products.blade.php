@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Produkty</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
            <a href="./products/add" class="btn btn-outline-light" type="submit">Dodaj produkt</a>
        </div>
    </nav>
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Kategoria</th>
                <th scope="col">Podkategoria</th>
                <th scope="col">Cena</th>
                <th scope="col">Kolor</th>
                <th scope="col">Ilość</th>
                <th scope="col">Rozmiar</th>
                <th scope="col">Kod produktu</th>
                <th scope="col">Waga</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->categoryName }}</td>
                <td>{{ $product->subcategoryName }}</td>
                <td>{{ $product->price }} zł</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->code_product }}</td>
                <td>{{ $product->weight }} kg</td>
                <td>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id={{ $product->id }}><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <th data-field="description" data-searchable="false">Opis</th>
                <td colspan="12">{{ $product->description }}</td>
            </tr>
            @empty
                <th scope="col" colspan="11" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex">
        {!! $products->links() !!}
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edycja produktu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/product/edit/{{ $product->id }}" class="mb-3">
                        @csrf
                        <div class="col-12 mb-4" style="display: flex">
                            <div class="col-6">
                                <div class="form-group row pt-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nazwa') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $product->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row pt-3">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Cena') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ $product->price }}" required autocomplete="price">

                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row pt-3">
                                    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Kolor') }}</label>

                                    <div class="col-md-6">
                                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                                            value="{{ $product->color }}" required autocomplete="color">

                                        @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row pt-3">
                                    <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Ilość') }}</label>

                                    <div class="col-md-6">
                                        <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"
                                            value="{{ $product->amount }}" required autocomplete="amount">

                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
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
                                    <label for="code_product" class="col-md-4 col-form-label text-md-right">{{ __('Kod produktu') }}</label>

                                    <div class="col-md-6">
                                        <input id="code_product" type="text" placeholder="(krzeslo-kolor-numer=KRZ-CZA-3)"
                                            class="form-control @error('code_product') is-invalid @enderror" name="code_product"
                                            value="{{ $product->code_product }}" required autocomplete="code_product">

                                        @error('code_product')
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
                                            value="{{ $product->weight }}" required autocomplete="weight">

                                        @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row pt-3">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Opis produktu') }}</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ $product->description }}" required autocomplete="description">

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 pt-3" style="justify-content: center; text-align: center;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Zamknij</button>
                            <button type="submit" class="btn btn-success">Edytuj produkt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Usuwanie produktu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć ten produkt?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <button type="button" class="btn btn-success">TAK</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="deleteModal">NIE</button>
                </div>
            </div>
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
