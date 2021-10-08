@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Podkategorie</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
            <a href="./subcategories/add" class="btn btn-light" type="submit">Dodaj podkategorię</a>
        </div>
    </nav>
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subcategories as $subcategory)
            <tr>
                <th scope="row">{{ $subcategory->id }}</th>
                <td>{{ $subcategory->name }}</td>
                <td>
                    <button class="btn btn-success btn-sm editbtn" id="editSubcategory" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id={{ $subcategory->id }}><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id={{ $subcategory->id }}><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @empty
                <th scope="col" colspan="3" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex">
        {!! $subcategories->links() !!}
    </div>

    @if(!$subcategories->isEmpty())
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edycja podkategorii</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/subcategory/edit" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="col-12 pb-3">
                            <div class="form-group row pt-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">Nazwa podkategorii</label>

                                <div class="col-md-6 subcategoryName">
                                    <input id="name" type="text" class="form-control"
                                        name="name" value="{{ $subcategory->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" id="subcategory_id" name="subcategory_id" value="">
                        <div class="col-12 pt-3" style="justify-content: center; text-align: center;">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"
                                aria-label="Close">Zamknij</button>
                            <button type="submit" class="btn btn-outline-dark ms-2">Edytuj podkategorię</button>
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
                    <h5 class="modal-title" id="deleteModalLabel">Usuwanie podkategorii</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć tę podkategorię?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <form method="POST" action="/subcategory/delete" class="mb-3">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="subcategory_id" name="subcategory_id" value="">
                        <button type="submit" class="btn btn-success">TAK</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NIE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
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

            $.get('subcategory/' + id + '', function (data) {
                var inputName = editModal.querySelector('.subcategoryName input')
                inputName.value = data.name
                var inputID = editModal.querySelector('.modal-body form')
                inputID.action = '/subcategory/edit/' + data.id
            })
        });

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            $.get('subcategory/' + id + '', function (data) {
            var inputID = deleteModal.querySelector('.modal-footer form')
            inputID.action = '/subcategory/delete/' + data.id
            })
        });
    });
</script>
@endsection
