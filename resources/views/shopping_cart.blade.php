@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success col-4" role="alert" style="text-align: center">
        <div>
            <i class="fas fa-check-circle"></i> {{ session('message') }}
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
        </div>
    </div>
    @endif
    @php ($product_id = [])
    @php ($amount = [])
    @forelse($carts as $cart)
    <table id="cart" class="table">
        <thead>
            <tr>
                <th class="col-6" style="text-align: center">NAZWA PRODUKTU</th>
                <th>CENA</th>
                <th class="col-1" style="text-align: center">ILOŚĆ</th>
                <th style="text-align: center">KOSZT</th>
                <th>AKCJE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="../storage/{{ $cart->options->photo }}" class="thumbnail img-thumbnail" /></div>
                        <div class="col-sm-9">
                            @php ($product_id[] = $cart->id)
                            @php ($amount[] = $cart->qty)
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
                <td>
                    <button class="btn btn-success btn-sm editbtn" id="editCart" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id={{ $cart->rowId }}><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id={{ $cart->rowId }}><i class="fas fa-trash"></i></button>
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
    @isset($cart)
    <form method="POST" action="/order/store">
        @csrf
        <div class="summary col-6" style="display: inline; text-align: right">
            <div class="order-summary">
                <p class="summary-info"><span class="title">Koszt: </span><span style="font-weight: bold">{{ $subtotal }}zł</span></p>
                <div class="form-group pb-3 col-3" style="display: inline-flex">
                    <label class=" me-2 pt-1" for="delivery">Dostawa:</label>
                    <select class="form-select" id="delivery" name="delivery" style="font-weight: bold; text-align: center; width: 250px" required>
                        <option selected disabled value="">Sposób dostawy</option>
                        <option value="0">Odbiór osobisty - 0 zł</option>
                        @if($subtotal <= 500)
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
                <h2 class="summary-info total-info ">
                    <span style="font-weight: bold" id="selected"></span>
                    <span style="font-weight: bold" id="subtotal" data-bs-id={{ $subtotal }}></span>
                </h2>
                <hr>
                <input type="hidden" id="subtotal" name="subtotal" value="{{ $subtotal }}">
                <input type="hidden" id="product_id" name="product_id" value="{{ json_encode($product_id) }}">
                <input type="hidden" id="amount" name="amount" value="{{ json_encode($amount) }}">
            </div>
            <div class="checkout-info mb-3" style="text-align: center">
                <button type="submit" class="btn btn-outline-dark me-2">
                    <i class="fas fa-money-bill-wave"></i> Zapłać
                </button>
                <a class="btn btn-outline-dark ms-2 me-2" href="/furniture"><i class="fas fa-shopping-cart"></i> Kontynuuj zakupy</a>
            </div>
        </div>
    </form>
    @endisset
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Zmiana ilości</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/cart/update" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="col-12 pb-3">
                            <div class="form-group row pt-3">
                                <label for="quantity"
                                    class="col-md-4 col-form-label text-md-right">Ilość</label>

                                <div class="col-md-6 quantity">
                                    <input id="quantity" type="text" class="form-control"
                                        name="quantity" value="{{ old('$cart->quantity') }}" required autocomplete="quantity" autofocus>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 pt-3" style="justify-content: center; text-align: center;">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"
                                aria-label="Close">Zamknij</button>
                            <button type="submit" class="btn btn-outline-dark ms-2">Zmień ilość</button>
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
                    <h5 class="modal-title" id="deleteModalLabel">Usuwanie produktu z koszyka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                    <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć ten produkt?</p>
                </div>
                <div class="modal-footer" style="justify-content: center">
                    <form method="POST" action="/cart/delete" class="mb-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success">TAK</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NIE</button>
                    </form>
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
<script>
    $(document).ready(function () {
        var editModal = document.getElementById('editModal')
        var deleteModal = document.getElementById('deleteModal')

        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');
            var inputID = editModal.querySelector('.modal-body form')
            inputID.action = '/cart/update/' + id
        });

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');
            var inputID = deleteModal.querySelector('.modal-footer form')
            inputID.action = '/cart/delete/' + id
        });

        var delivery = $('#delivery');
        var selected = $('#selected');

        delivery.on('change', function(){
        var selectedOptionText = $(this).children(':selected').val();
        var subtotal = document.getElementById('subtotal')
        price = subtotal.getAttribute('data-bs-id');

        var total = parseFloat(selectedOptionText) + parseFloat(price);
        selected.text('Razem: ' + total + ' zł');
        });
    });
</script>
@endsection

