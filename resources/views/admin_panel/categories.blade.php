@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kategorie</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
            <a href="./categories/add" class="btn btn-outline-light" type="submit">Dodaj kategorię</a>
        </div>
    </nav>
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search">
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
                    <td>
                        <button class="btn btn-success btn-sm editbtn" id="editCategory" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id={{ $category->id }}><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id={{ $category->id }}><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @empty
                <th scope="col" colspan="3" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex">
        {!! $categories->links() !!}
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edycja kategorii</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/category/edit" class="mb-3">
                        @csrf
                        @method('PUT')
                            <div class="col-12 pb-3">
                                <div class="form-group row pt-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nazwa kategorii') }}</label>

                                    <div class="col-md-6 categoryName">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $category->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <input type="hidden" id="category_id" name="category_id" value="">
                        <div class="col-12 pt-3" style="justify-content: center; text-align: center;">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"
                                aria-label="Close">Zamknij</button>
                            <button type="submit" class="btn btn-outline-dark ms-2">Edytuj kategorię</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Usuwanie kategorii</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć tę kategorię?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <form method="POST" action="/category/delete" class="mb-3">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="category_id" name="category_id" value="">
                        <button type="submit" class="btn btn-success">TAK</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NIE</button>
                    </form>
                </div>
            </div>
        </div>
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
<script>
    $(document).ready(function () {
        var editModal = document.getElementById('editModal')
        var deleteModal = document.getElementById('deleteModal')

        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            $.get('category/' + id + '', function (data) {
                var inputName = editModal.querySelector('.categoryName input')
                inputName.value = data.name
                var inputID = editModal.querySelector('.modal-body form')
                inputID.action = '/category/edit/' + data.id
            })
        });

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            $.get('category/' + id + '', function (data) {
            var inputID = deleteModal.querySelector('.modal-footer form')
            inputID.action = '/category/delete/' + data.id
            })
        });
    });
</script>
@endsection
