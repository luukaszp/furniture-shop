@extends('layouts.app')
@section('content')
<div class="container">
    <table id="cart" class="table">
        <thead>
            <tr>
                <th class="col-6" style="text-align: center">NAZWA PRODUKTU</th>
                <th>CENA</th>
                <th class="col-1" style="text-align: center">ILOŚĆ</th>
                <th style="text-align: center">KOSZT</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($carts as $cart)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="../storage/{{ $cart->options->photo }}" class="thumbnail img-thumbnail" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $cart->name }}</h4>
                            <p>Waga: <span style="font-weight: bold">{{ $cart->weight }} kg</span></p>
                            <p>Kolor: <span style="font-weight: bold">{{ $cart->options->color }}</span></p>
                            <p>Rozmiar: <span style="font-weight: bold">{{ $cart->options->size }}</span></p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{ $cart->price }} zł</td>
                <td data-th="Price" class="text-center">{{ $cart->qty }}</td>
                <td data-th="Subtotal" class="text-center">{{ number_format($cart->price * $cart->qty, 2) }} zł</td>
                <td class="actions" data-th="">
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @empty
            <div style="text-align: center">
                <i class="fas fa-shopping-cart fa-7x mb-4" style="color: gray"></i>
                <h1 class="mb-3">Koszyk jest pusty!</h1>
                <a class="btn btn-outline-dark mb-3" href="/furniture">Przeglądaj produkty</a>
            </div>
            @endforelse
        </tbody>
    </table>
    <form>
        <div class="summary col-6" style="display: inline; text-align: right">
            <div class="order-summary">
                <p class="summary-info"><span class="title">Koszt: </span><span style="font-weight: bold">{{ $subtotal }}zł</span></p>
                <div class="form-group pb-3 col-3" style="display: inline-flex">
                    <label class=" me-2 pt-1" for="delivery">Dostawa:</label>
                    <select class="form-control" id="delivery" name="delivery" style="font-weight: bold" required>
                        <option value="0">Odbiór osobisty - 0 zł</option>
                        @if($subtotal < 500)
                        <option value="50">Bez wniesienia - 50 zł</option>
                        <option value="80">Z wniesieniem - 80 zł</option>
                        @else
                        <option value="0">Bez wniesienia - 0 zł</option>
                        <option value="30">Z wniesieniem - 30 zł</option>
                        @endif
                    </select>
                    <div class="invalid-feedback">
                        Proszę wybrać sposób dostawy.
                    </div>
                </div>
                <hr>
                <h2 class="summary-info total-info "><span class="title">Razem: </span><span style="font-weight: bold">{{ $subtotal }}zł</span></h2>
                <hr>
            </div>
            <div class="checkout-info mb-3" style="text-align: center">
                <a class="btn btn-outline-dark me-2" href="checkout.html"><i class="fas fa-money-bill-wave"></i> Zapłać</a>
                <a class="btn btn-outline-dark ms-2" href="/furniture"><i class="fas fa-shopping-cart"></i> Kontynuuj zakupy</i></a>
            </div>
        </div>
    </form>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edytuj zamówienie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="display: inline-flex">
                    <p class="col-2 pt-3">Ilość: </p>
                    <input type="number" class="form-control text-center" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="button" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .thumbnail:hover {
    transform: scale(2.0);
    }
</style>
@endsection

