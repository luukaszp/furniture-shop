@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Zamówienia</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Wyszukaj</button>
            </form>
        </div>
    </nav>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numer zamówienia</th>
                <th scope="col">Data zamówienia</th>
                <th scope="col">Wartość</th>
                <th scope="col">Status płatności</th>
                <th scope="col">Status zamówienia</th>
                <th scope="col">Numer przesyłki</th>
                <th scope="col">Potwierdzenie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="/orders/14002">14002</td>
                <td>30 sierpnia 2021</td>
                <td>59,00 zł</td>
                <td>przesyłka wysłana</td>
                <td>zamówienie ukończone</td>
                <td>Przycisk - potwierdzenie otrzymania zamówienia</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>14003</td>
                <td>31 sierpnia 2021</td>
                <td>19,00 zł</td>
                <td>oczekiwanie na wpłatę</td>
                <td>zamówienie w trakcie</td>
                <td>Przycisk - potwierdzenie otrzymania zamówienia</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
