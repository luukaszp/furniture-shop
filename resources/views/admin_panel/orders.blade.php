@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Zamówienia</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
        </div>
    </nav>
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Zamawiający</th>
                <th scope="col">Numer zamówienia</th>
                <th scope="col">Data zamówienia</th>
                <th scope="col">Wartość</th>
                <th scope="col">Status płatności</th>
                <th scope="col">Status zamówienia</th>
                <th scope="col">Numer przesyłki</th>
                <th scope="col">Akcja</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->name }} {{ $order->surname }}</td>
                <td><a href="/order/{{ $order->id }}">{{ $order->order_number }}</a></td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->order_amount }} zł</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->tracking_number }}</td>
                <td>
                    <button class="btn btn-success btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#realizationModal" data-bs-id={{ $order->id }}><i class="fas fa-check-circle"></i></button>
                </td>
            </tr>
            @empty
            <th scope="col" colspan="9" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex; padding-top: 25px">
        {!! $orders->links() !!}
    </div>

    @if(!$orders->isEmpty())
    <div class="modal fade" id="realizationModal" tabindex="-1" aria-labelledby="realizationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="realizationModalLabel">Potwierdzenie wysłania przesyłki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz potwierdzić status tego zamówienia?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <form method="POST" action="/order/realization" class="mb-3">
                        @csrf
                        @method('PUT')
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
    var realizationModal = document.getElementById('realizationModal')

    realizationModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-bs-id');

        $.get('/order/fetch/' + id + '', function (data) {
            var inputID = realizationModal.querySelector('.modal-footer form')
                inputID.action = '/order/realization/' + data.id
            })
        });
    });
</script>
@endsection
