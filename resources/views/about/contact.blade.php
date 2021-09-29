@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="row me-1">
                <div class="card bg-white rounded shadow-sm py-5 px-4 mb-2" style="height: 225px"><i class="fas fa-phone pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">Telefon</h5><span class="small text-uppercase text-muted">+48 667 744 888</span>
                </div>

                <div class="card bg-white rounded shadow-sm py-5 px-4 mt-2" style="height: 225px"><i class="fas fa-map-marker-alt pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">Adres sklepu</h5><span class="small text-uppercase text-muted">51-218 Wrocław</span><br><span class="small text-uppercase text-muted">ul. Admiralska 1</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="row ms-1">
                <div class="card bg-white rounded shadow-sm py-5 px-4 mb-2" style="height: 225px"><i class="fas fa-envelope pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">E-mail</h5><span class="small text-uppercase text-muted">sklep-meblowy@gmail.com</span>
                </div>

                <div class="card bg-white rounded shadow-sm py-5 px-4 mt-2" style="height: 225px"><i class="fas fa-fax pb-3" style="font-size: 3em; color: rgb(158, 91, 2)"></i>
                    <h5 class="mb-0">Faks</h5><span class="small text-uppercase text-muted">(88) 888-88-88 </span>
                </div>
            </div>
        </div>
    <div class="col">
        <form class="border border-success px-4 py-4">
            <h1 class="py-4">Skontaktuj się z nami!</h1>
            <div class="mb-3">
                <label for="input-name" class="form-label">Imię i nazwisko</label>
                <input type="name" class="form-control" id="input-name" placeholder="John Smith">
            </div>
            <div class="mb-3">
                <label for="input-email" class="form-label">Adres e-mail</label>
                <input type="email" class="form-control" id="input-email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">Treść wiadomości</label>
                <textarea class="form-control" id="textarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Wyślij</button>
        </form>
    </div>
</div>
@endsection
