@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">Resetowanie hasła</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row py-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    Resetuj hasło
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
