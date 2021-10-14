@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success" role="alert" style="text-align: center">
        <div>
            <i class="fas fa-check-circle"></i></i> {{ session('message') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger" style="text-align: center">
        <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        <ul>
            @foreach ($errors->all() as $error)
            <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row text-center">
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="row ms-1 me-1">
                <div class="card bg-white rounded shadow-sm py-5 px-4 mb-2" style="height: 225px"><i class="fas fa-phone pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">Telefon</h5><span class="small text-uppercase text-muted">+48 667 744 888</span>
                </div>

                <div class="card bg-white rounded shadow-sm py-5 px-4 mt-2" style="height: 225px"><i class="fas fa-map-marker-alt pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">Adres sklepu</h5><span class="small text-uppercase text-muted">51-218 Wrocław</span><br><span class="small text-uppercase text-muted">ul. Admiralska 1</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="row me-1 ms-1">
                <div class="card bg-white rounded shadow-sm py-5 px-4 mb-2" style="height: 225px"><i class="fas fa-envelope pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">E-mail</h5><span class="small text-uppercase text-muted">sklep-meblowy@gmail.com</span>
                </div>

                <div class="card bg-white rounded shadow-sm py-5 px-4 mt-2" style="height: 225px"><i class="fas fa-fax pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">Faks</h5><span class="small text-uppercase text-muted">(88) 888-88-88 </span>
                </div>
            </div>
        </div>
    <div class="col">
        <form method="POST" action="/question/store" class="border border-success px-4 py-4">
            @csrf
            <h1 class="py-4">Skontaktuj się z nami!</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Imię i nazwisko</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="John Smith" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Treść wiadomości</label>
                <textarea type="text" class="form-control" id="question" name="question" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Wyślij</button>
        </form>
    </div>
</div>
<style>
    ul {
        list-style-type: none;
    }
</style>
@endsection
