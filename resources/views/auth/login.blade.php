@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <div>
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    @if (session('message'))
    <div class="alert alert-danger" role="alert">
        <div>
            <i class="fas fa-exclamation-triangle"></i></i> {{ session('message') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        <ul>
            @foreach ($errors->all() as $error)
            <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @isset ($message)
    <div class="alert alert-danger" role="alert">
        <div>
            <i class="fas fa-exclamation-triangle" style="margin-right: 10px"></i></i> {{ $message }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endisset
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

                        <div class="form-group row mb-0" style="justify-content: center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success mb-2">
                                    Zaloguj się
                                </button>
                                <a class="btn btn-link link-dark" style="text-decoration: none" href="/password/reset">
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
<style>
    ul {
        list-style-type: none;
    }
</style>
@endsection
