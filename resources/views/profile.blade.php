@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/profile/user_orders">Zamówienia</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/profile/contact_details">Dane wysyłkowe</a>
        </li>
    </ul>
</div>
@endsection
