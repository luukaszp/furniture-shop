@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Klienci</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
        </div>
    </nav>
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Adres e-mail</th>
                <th scope="col">Adres</th>
                <th scope="col">Kod pocztowy</th>
                <th scope="col">Miejscowość</th>
                <th scope="col">Województwo</th>
                <th scope="col">Telefon komórkowy</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Łukasz</td>
                <td>Poterała</td>
                <td>lukasz.poterala@wp.pl</td>
                <td>Niedaszów 6A</td>
                <td>59-407</td>
                <td>Mściwojów</td>
                <td>dolnośląskie</td>
                <td>665544334</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Anna</td>
                <td>Kowalska</td>
                <td>anna.kowalska@wp.pl</td>
                <td>ul. Akacjowa 3B</td>
                <td>59-400</td>
                <td>Jawor</td>
                <td>dolnośląskie</td>
                <td>665577889</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
