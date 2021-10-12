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
                <div class="card-header" style="font-size: 24px; font-weight: bold">{{ __('Rejestracja') }}</div>

                <div class="card-body">
                    <form method="POST" action="/register/post">
                        @csrf

                        <div class="form-group row pt-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Imię</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="name@example.com" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Adres zamieszkania</label>

                            <div class="col-md-6">
                                <input id="address" type="text" placeholder="ul. Akacjowa 3B" class="form-control" name="address"
                                    value="{{ old('address') }}" required autocomplete="address">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">Kod pocztowy</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" placeholder="59-400" class="form-control" name="zip_code"
                                    value="{{ old('zip_code') }}" required autocomplete="zip_code">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Miejscowość</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control"
                                    name="city" value="{{ old('city') }}" required autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="province" class="col-md-4 col-form-label text-md-right">Województwo</label>

                            <div class="col-md-6">
                                <select class="form-select" id="province" type="text" aria-label=".form-select" name="province"
                                    value="{{ old('province') }}" required autocomplete="province">
                                    <option selected value="dolnośląskie">dolnośląskie</option>
                                    <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                                    <option value="lubelskie">lubelskie</option>
                                    <option value="lubuskie">lubuskie</option>
                                    <option value="łódzkie">łódzkie</option>
                                    <option value="małopolskie">małopolskie</option>
                                    <option value="mazowieckie">mazowieckie</option>
                                    <option value="opolskie">opolskie</option>
                                    <option value="podkarpackie">podkarpackie</option>
                                    <option value="podlaskie">podlaskie</option>
                                    <option value="pomorskie">pomorskie</option>
                                    <option value="śląskie">śląskie</option>
                                    <option value="świętokrzyskie">świętokrzyskie</option>
                                    <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                                    <option value="wielkopolskie">wielkopolskie</option>
                                    <option value="zachodniopomorskie">zachodniopomorskie</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numer telefonu</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" placeholder="666555444" class="form-control" step="any" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Potwierdź hasło</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    Zarejestruj się
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
