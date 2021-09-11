@extends('layouts.app')
@section('content')
<div class="container">
    <table id="cart" class="table">
        <thead>
            <tr>
                <th class="col-6" style="text-align: center">NAZWA PRODUKTU</th>
                <th>CENA</th>
                <th class="col-1" style="text-align: center">ILOŚĆ</th>
                <th style="text-align: center">SUMA CZĘŚCIOWA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..."
                                class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">Product 1</h4>
                            <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">$1.99</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="1">
                </td>
                <td data-th="Subtotal" class="text-center">1.99</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" />
                        </div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">Product 1</h4>
                            <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">$1.99</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="1">
                </td>
                <td data-th="Subtotal" class="text-center">1.99</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="summary col-6" style="display: inline; text-align: right">
        <div class="order-summary">
            <p class="summary-info"><span class="title">Suma częściowa: </span><span style="font-weight: bold">$512.00</span></p>
            <p class="summary-info"><span class="title">Dostawa: </span><span style="font-weight: bold">Darmowa dostawa</span></p>
            <hr>
            <h2 class="summary-info total-info "><span class="title">Razem: </span><span style="font-weight: bold">$512.00</span></h2>
            <hr>
        </div>
        <div class="checkout-info mb-3" style="text-align: center">
            <a class="btn btn-outline-dark me-2" href="checkout.html"><i class="fas fa-money-bill-wave"></i> Zapłać</a>
            <a class="btn btn-outline-dark ms-2" href="shop.html"><i class="fas fa-shopping-cart"></i> Kontynuuj zakupy</i></a>
        </div>
    </div>
</div>
@endsection

