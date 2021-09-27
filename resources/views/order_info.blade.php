@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Szczegóły zamówienia</a>
            <form class="d-flex">
                <input class="form-control me-2" id="search" type="search" placeholder="Szukaj" aria-label="Search">
            </form>
        </div>
    </nav>
    @php $products=$orders[0]->products @endphp
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search"
        style="text-align: center">
        <thead>
            <tr>
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
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->order_amount }} zł</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->tracking_number }}</td>
                @if(auth()->user()->id === $order->users->id)
                <td>
                    <button class="btn btn-success btn-sm editbtn" data-bs-toggle="modal"
                        data-bs-target="#receivedModal" data-bs-id={{ $order->id }}><i class="fas fa-check-circle"></i></button>
                </td>
                @endif
            </tr>
            @empty
            <th scope="col" colspan="3" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search"
        style="text-align: center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa produktu</th>
                <th scope="col">Cena</th>
                <th scope="col">Kolor</th>
                <th scope="col">Rozmiar</th>
                <th scope="col">Sztuki</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->pivot->quantity }}</td>
            </tr>
            @empty
            <th scope="col" colspan="3" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    @if(!$orders->isEmpty() && auth()->user()->id === $order->users->id)
    <div class="modal fade" id="receivedModal" tabindex="-1" aria-labelledby="receivedModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receivedModalLabel">Potwierdzenie otrzymania przesyłki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz potwierdzić otrzymanie przesyłki?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <form method="POST" action="/order/received" class="mb-3">
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
<script>
    $(document).ready(function () {
    var receivedModal = document.getElementById('receivedModal')

    receivedModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-bs-id');

        $.get('fetch/' + id + '', function (data) {
            var inputID = receivedModal.querySelector('.modal-footer form')
                inputID.action = '/order/received/' + data.id
            })
        });
    });
</script>
@endsection
