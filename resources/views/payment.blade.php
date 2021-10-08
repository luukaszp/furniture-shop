@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger col-6" style="text-align: center">
            <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
            <ul>
                @foreach ($errors->all() as $error)
                <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
                            <div class="form-group row pt-3">
                                <label for="cardOwner" class="col-md-4 col-form-label text-md-right">Imię właściciela karty</label>

                                <div class="col-md-6">
                                    <input id="cardOwner" type="text" class="form-control" name="cardOwner" value="{{ old('cardOwner') }}" placeholder="John Smith" required autocomplete="cardOwner" autofocus>
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <label for="cardNumber" class="col-md-4 col-form-label text-md-right">Numer karty</label>

                                <div class="col-md-6">
                                    <input id="cardNumber" type="text" class="form-control" name="cardNumber" value="{{ old('cardNumber') }}" placeholder="4242 4242 4242 4242" required autocomplete="cardNumber" autofocus>
                                </div>
                            </div>
                                <div class="form-group row pt-3">
                                    <label for="cardCvc" class="col-md-4 col-form-label text-md-right">CVC</label>

                                    <div class="col-md-6">
                                        <input id="cardCvc" type="text" class="form-control" name="cardCvc" value="{{ old('cardCvc') }}"
                                            placeholder="ex. 311" required autocomplete="cardCvc" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="cardExpiryMonth" class="col-md-4 col-form-label text-md-right">Miesiąc ważności</label>

                                    <div class="col-md-6">
                                        <input id="cardExpiryMonth" type="text" class="form-control" name="cardExpiryMonth" value="{{ old('cardExpiryMonth') }}" placeholder="MM" required autocomplete="cardExpiryMonth" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="cardExpiryYear" class="col-md-4 col-form-label text-md-right">Rok ważności</label>

                                    <div class="col-md-6">
                                        <input id="cardExpiryYear" type="text" class="form-control" name="cardExpiryYear" value="{{ old('cardExpiryYear') }}" placeholder="YYYY" required autocomplete="cardExpiryYear" autofocus>
                                    </div>
                                </div>
                                @isset($order)
                                <input type="hidden" id="orderID" name="orderID" value="{{ $order->id }}">
                                @endisset
                                @empty($order)
                                <input type="hidden" id="orderID" name="orderID" value="{{ Str::of(url()->previous())->after('order/') }}">
                                @endempty
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
