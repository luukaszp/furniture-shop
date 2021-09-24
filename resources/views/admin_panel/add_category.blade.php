@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card" style="text-align: center">
                <div class="card-header" style="font-size: 24px; font-weight: bold">Dodawanie kategorii</div>

                <div class="card-body">
                    <form method="POST" action="/category/store">
                        @csrf

                        <div class="form-group row pt-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">Nazwa kategorii</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0 pt-3">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-success">
                                    Dodaj kategorię
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
