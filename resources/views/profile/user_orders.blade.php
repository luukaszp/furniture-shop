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
    <table class="table table-striped" data-toggle="table" data-search="true" data-search-selector="#search"
        style="text-align: center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numer zamówienia</th>
                <th scope="col">Data zamówienia</th>
                <th scope="col">Wartość</th>
                <th scope="col">Status płatności</th>
                <th scope="col">Status zamówienia</th>
                <th scope="col">Numer przesyłki</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td><a href="/order/{{ $order->id }}">{{ $order->order_number }}</a></td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->order_amount }} zł</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->tracking_number }}</td>
            </tr>
            @empty
            <th scope="col" colspan="7" class="font-weight-bold text-center">Brak danych</th>
            @endforelse
        </tbody>
    </table>

    <div style="justify-content: center; display: flex; padding-top: 25px">
        {!! $orders->links() !!}
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
