@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kategorie</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Wyszukaj</button>
            </form>
            <a href="./categories/add" class="btn btn-outline-light" type="submit">Dodaj kategorię</a>
        </div>
    </nav>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
            @empty
                <h3 class="font-weight-bold text-center">Brak danych</h3>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
