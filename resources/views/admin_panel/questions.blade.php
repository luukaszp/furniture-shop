@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Pytania</a>
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
                <th scope="col">E-mail</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @forelse($questions as $question)
            <tr>
                <th scope="row">{{ $question->id }}</th>
                <td>{{ $question->name }}</td>
                <td>{{ $question->surname }}</td>
                <td>{{ $question->email }}</td>
                <td>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id={{ $question->id }}><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <th data-field="question" data-searchable="false">Opis</th>
                <td colspan="12">{{ $question->question }}</td>
            </tr>
            @empty
            <th scope="col" colspan="3" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex">
        {!! $questions->links() !!}
    </div>

    @if(!$questions->isEmpty())
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Usuwanie pytania</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć te pytanie?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <form method="POST" action="/question/delete" class="mb-3">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="question_id" name="question_id" value="">
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
        var deleteModal = document.getElementById('deleteModal')

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            $.get('question/' + id + '', function (data) {
            var inputID = deleteModal.querySelector('.modal-footer form')
            inputID.action = '/question/delete/' + data.id
            })
        });
    });
</script>
@endsection
