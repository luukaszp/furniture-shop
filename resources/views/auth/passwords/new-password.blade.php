@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-danger col-6" role="alert" style="text-align: center">
        <div>
            <i class="fas fa-exclamation-triangle"></i> {{ session('message') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">Nowe hasło</div>

                <div class="card-body">
                    <form method="POST" action="/password/new">
                        <div class="form-group row pt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="name@example.com" class="form-control"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Potwierdź
                                hasło</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="{{ $id }}">

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
@endsection
