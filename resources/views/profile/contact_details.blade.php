@extends('layouts.app')

@section('content')
<div class="container col-5" style="border: 5px solid black">
    <div class="row text-center">
        <h2 class="card-header mt-1" style="font-family: Copperplate">Dane wysyłkowe</h2>
        <hr>
        @forelse($users as $user)
        <div class="col-6" style="text-align: left">
            <div class="user_info">
                <i class="fas fa-user mt-2 mb-2 card-header" style="color:rgb(158, 91, 2); text-align: center"> Dane osobowe</i>
                <p><span style="font-weight: bold">Imię: </span></b> {{ $user->name }}</p>
                <p><span style="font-weight: bold">Nazwisko: </span>{{ $user->surname }}</p>
            </div>
            <div class="email">
                <i class="fas fa-at mt-2 mb-2 card-header" style="color:rgb(158, 91, 2)"> E-mail / login</i>
                <p><span style="font-weight: bold">E-mail: </span>{{ $user->email }}</p>
            </div>
            <div class="phone_number">
                <i class="fas fa-phone-volume mt-2 mb-2 card-header" style="color:rgb(158, 91, 2)"> Numer telefonu</i>
                <p><span style="font-weight: bold">Telefon: </span>{{ $user->phone_number }}</p>
            </div>
        </div>
        <div class="col-6" style="text-align: left">
            <div class="address">
                <i class="fas fa-map-marked-alt mt-2 mb-2 card-header" style="color:rgb(158, 91, 2)"> Adres wysyłki</i>
                <p><span style="font-weight: bold">Ulica: </span>{{ $user->address }}</p>
                <p><span style="font-weight: bold">Kod pocztowy: </span>{{ $user->zip_code }}</p>
                <p><span style="font-weight: bold">Miasto: </span>{{ $user->city }}</p>
                <p><span style="font-weight: bold">Województwo: </span>{{ $user->province }}</p>
            </div>
        </div>
        @empty
            <div>
                <h1>Brak danych</h1>
            </div>
        @endforelse
        <div class="editButton" style="text-align: center; justify-content: center">
            <button type="button" class="btn btn-outline-dark mb-4" data-bs-toggle="modal" data-bs-target="#modalEdit">Edytuj dane</button>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edycja danych</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @forelse($users as $user)
                        <form method="POST" action="/profile/contact_details/edit">
                            @csrf

                            <div class="form-group row pt-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ $user->surname }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"
                                        required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adres') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}"
                                        required autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Kod pocztowy') }}</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text"
                                        class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                        value="{{ $user->zip_code }}" required autocomplete="zip_code">

                                    @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Miejscowość') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ $user->city }}" required autocomplete="city">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Województwo') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="province" type="text" aria-label=".form-select" @error('province')
                                        is-invalid @enderror" name="province" value="{{ $user->province }}" required autocomplete="province">
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
                                    @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3 mb-5">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Telefon komórkowy') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ $user->phone_number }}" required autocomplete="phone_number">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer" style="justify-content: center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                                <button type="submit" class="btn btn-outline-dark">Zapisz zmiany</button>
                            </div>
                        </form>
                        @empty
                        <div>
                            <h1>Brak danych</h1>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
