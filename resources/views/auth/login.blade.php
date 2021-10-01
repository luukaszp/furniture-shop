@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-danger col-4" role="alert" style="text-align: center">
        <div>
            <i class="fas fa-exclamation-triangle"></i> {{ session('message') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">Logowanie</div>

                <div class="card-body">
                    <form method="POST" action="/login/post">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Zaloguj się
                                </button>
                                <a class="btn btn-link link-dark" style="text-decoration: none" href="/password.request">
                                    Zapomniałeś hasła?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
