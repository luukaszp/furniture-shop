@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Klienci</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
        </div>
    </nav>
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search" style="text-align: center">
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
            @forelse($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->zip_code }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->province }}</td>
                <td>{{ $user->phone_number }}</td>
            </tr>
            @empty
            <th scope="col" colspan="9" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex; padding-top: 25px">
        {!! $users->links() !!}
    </div>
</div>
<style>
    .pagination .page-link {
        background: black;
        color: white;
    }

    .page-item.active .page-link {
        background: white;
        color: black;
    }
</style>
@endsection
