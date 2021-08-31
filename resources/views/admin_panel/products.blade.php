@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Produkty</a>
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
                <th scope="col">Nazwa</th>
                <th scope="col">Kolor</th>
                <th scope="col">Waga</th>
                <th scope="col">Kod</th>
                <th scope="col">Producent</th>
                <th scope="col">Cena</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Fotel</td>
                <td>Szary</td>
                <td>5 kg</td>
                <td>01-105</td>
                <td>Jack-O</td>
                <td>59,00 zł</td>
                <td>
                    <span style="color: orange">
                        <i class="far fa-edit pe-1" data-bs-toggle="modal" data-bs-target="#modal"></i>
                    </span>
                    <span style="color: red">
                        <i class="far fa-trash-alt ps-1" data-bs-toggle="modal" data-bs-target="#modal2"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Kanapa</td>
                <td>Brązowy</td>
                <td>30 kg</td>
                <td>03-567</td>
                <td>Mister Furnit</td>
                <td>259,00 zł</td>
                <td>
                    <span style="color: orange">
                        <i class="far fa-edit pe-1" data-bs-toggle="modal" data-bs-target="#modal"></i>
                    </span>
                    <span style="color: red">
                        <i class="far fa-trash-alt ps-1" data-bs-toggle="modal" data-bs-target="#modal2"></i>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edycja produktu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="button" class="btn btn-primary">Zachowaj zmiany</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć ten produkt?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <button type="button" class="btn btn-success">TAK</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal2">NIE</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
