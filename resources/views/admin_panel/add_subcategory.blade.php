@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">{{ __('Dodawanie podkategorii') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="/subcategory/store">
                        @csrf

                        <div class="form-group row pt-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nazwa podkategorii') }}</label>

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
                                <select class="form-select" id="category" type="text" aria-label=".form-select" @error('category') is-invalid
                                    @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">
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

                        <div class="form-group row mb-0 pt-3">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Dodaj podkategorię') }}
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
