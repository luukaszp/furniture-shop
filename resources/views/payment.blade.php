@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="justify-content: center">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td" style="font-weight: bold">Szczegóły płatności</h3>
                        </div>
                    </div>
                    @isset($order)
                    <h5 class="pt-2">Do zapłaty:
                        <span style="font-weight: bold">{{ $order->order_amount }}zł</span>
                    </h5>
                    @endisset
                    <div class="panel-body" id="paymentForm">
                        <form class="payment-form" action="{{ route('payment.store') }}" method="POST">
                            @csrf
                            <div class='form-row row pt-3'>
                                <div class='col-xs-12 form-group'>
                                    <label class='control-label'>Imię właściciela karty</label>
                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>
                            <div class='form-row row pt-3'>
                                <div class='col-xs-12 form-group cardNumber required'>
                                    <label class='control-label'>Numer karty</label>
                                    <input autocomplete='off' class='form-control' name='cardNumber' placeholder="4242 4242 4242 4242" size='20' type='text' id="cardNumber">
                                </div>
                            </div>
                            <div class='form-row row pt-3'>
                                <div class='col-xs-12 col-md-4 form-group cvcNumber required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control' name='cardCvc' placeholder='ex. 311' size='4' type='text' id="cardCvc">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expirationMonth required'>
                                    <label class='control-label'>Miesiąc ważności</label>
                                    <input class='form-control' name='cardExpiryMonth' placeholder='MM' size='2' type='text' id="cardExpiryMonth">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expirationYear required'>
                                    <label class='control-label'>Rok ważności</label>
                                    <input class='form-control' name='cardExpiryYear' placeholder='YYYY' size='4' type='text' id="cardExpiryYear">
                                </div>
                                @isset($order)
                                <input type="hidden" id="orderID" name="orderID" value="{{ $order->id }}">
                                @endisset
                                @empty($order)
                                <input type="hidden" id="orderID" name="orderID" value="{{ Str::of(url()->previous())->after('order/') }}">
                                @endempty
                            </div>
                            <div class="row" style="text-align: center">
                                <div class="col-xs-12 pt-4">
                                    <button class="btn btn-success btn-lg btn-block" type="submit">Zapłać teraz</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
