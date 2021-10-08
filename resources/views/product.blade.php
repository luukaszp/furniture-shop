@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
        <div class="alert alert-success" role="alert">
            <div>
                <i class="fas fa-check-circle"></i> {{ session('message') }}
                <i class="fas fa-times-circle" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30px"></i>
            </div>
        </div>
        @endif
        <div class="product-info">
            <div class="row text-center">
                @forelse($products as $product)
                <div class="col-xl-6 col-sm-6 mb-5">
                    <div class="row me-1" style="width: 30rem">
                        <img src="../storage/{{ $product->photo }}" class="card-img-top" alt="armchair">
                    </div>
                </div>
                <div class="col" style="text-align: left">
                    <h1 class="pb-3" >{{ $product->name }}</h1>
                    <hr class="mb-4">
                    <div class="row mb-5">
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Dostępność:</p>
                            @if($product->amount >= 35)
                            <span class="badge rounded-pill bg-success" style="font-size: 12px">{{ $product->amount }} sztuk</span>
                            @elseif($product->amount < 35 && $product->amount > 15)
                            <span class="badge rounded-pill bg-warning text-dark" style="font-size: 12px">{{ $product->amount }} sztuk</span>
                            @else
                            <span class="badge rounded-pill bg-danger" style="font-size: 12px">{{ $product->amount }} sztuk</span>
                            @endif
                        </div>
                        <div class="col">
                            <p class="mb-0"style="font-weight: bold">Wysyłka w:</p>
                            <span style="font-size: 12px">7 dni roboczych</span>
                        </div>
                        <div class="col">
                            <p class="mb-0" style="font-weight: bold">Koszt dostawy:</p>
                            <span style="font-size: 12px">darmowa od 500 zł</span>
                        </div>
                    </div>
                    <h4>Cena</h4>
                    <h2 class="mb-3" style="font-weight: bold">{{ $product->price }} zł</h2>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group pb-3">
                            <h4>Kolor</h4>
                            <h2 style="font-weight: bold">{{ $product->color }}</h2>
                        </div>
                        <div class="form-group pb-3">
                            <h4>Rozmiar</h4>
                            <h2 style="font-weight: bold">{{ $product->size }}</h2>
                        </div>
                        <div class="form-group pb-3 col-3">
                            <label for="quantity">Ilość</label>
                            <input type="text" class="form-control" id="quantity" value="1" name="quantity" required>
                        </div>
                        @if ($cart->where('id', $product->id)->count())
                            <h3 class="mt-3" style="font-weight: bold; color: rgb(158, 91, 2)">Produkt znajduje się już w koszyku</h3>
                        @else
                        <div class="col-12 pb-3">
                            <button class="btn btn-dark" type="submit">
                                Do koszyka
                                <i class="fas fa-shopping-cart" style="font-size: 1em"></i>
                            </button>
                        </div>
                        @endif
                    </form>
                </div>
                <hr>
                <div class="description" style="text-align: left">
                    <h2 class="pb-4" style="font-weight: bold">Opis produktu</h2>
                    <p style="text-align: justify"> {{$product->description }}</p>
                </div>
                <hr>
                @empty
                    <h1>Brak danego produktu</h1>
                @endforelse
                <div class="ratings">
                    @guest
                    <h1 class="pt-3 pb-4">Zaloguj się by wystawić opinię</h1>
                    @endguest
                    @auth
                    @if($ratings->contains('user_id', Auth::user()->id))
                    <h1 class="pt-2 pb-4">Dziękujemy za wystawienie opinii!</h1>
                    @else
                    <h3>Wystaw opinię</h3>
                    <form style="justify-content: center; text-align: center; display: flex" method="POST" action="/rating/add">
                        @csrf
                        <div class="col-5 pb-4">
                            <div class="star-rating">
                                <input type="radio" id="5-stars" name="rate" value="5" />
                                <label for="5-stars" class="star">&#9733;</label>
                                <input type="radio" id="4-stars" name="rate" value="4" />
                                <label for="4-stars" class="star">&#9733;</label>
                                <input type="radio" id="3-stars" name="rate" value="3" />
                                <label for="3-stars" class="star">&#9733;</label>
                                <input type="radio" id="2-stars" name="rate" value="2" />
                                <label for="2-stars" class="star">&#9733;</label>
                                <input type="radio" id="1-star" name="rate" value="1" />
                                <label for="1-star" class="star">&#9733;</label>
                            </div>
                            <div class="form-group pt-3">
                                <div class="mb-3">
                                    <textarea id="opinion" rows="3" type="text" class="form-control" name="opinion" value="{{ old('opinion') }}" required autofocus></textarea>
                                </div>
                                <input type="hidden" id="product_id" name="product_id" value="{{ request()->id }}">
                            </div>
                            <button type="submit" class="btn btn-success">Wyślij opinię</button>
                        </div>
                    </form>
                    @endif
                    @endauth
                    <div class="list-group" style="text-align: left">
                        @forelse($ratings as $rating)
                            <a class="list-group-item list-group-item-action" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="comment-header" style="display: inline-flex">
                                        <h5 class="mb-1 pe-4">{{ $rating->users->name }} {{ $rating->users->surname }}</h5>
                                        <div class="rating-star" style="color: darkorange">
                                            @for($i = 0; $i < $rating->rate; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @for($i = $rating->rate; $i < 5; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    @auth
                                    <small class="text-muted">
                                        @if($rating->user_id == Auth::user()->id || auth()->user()->roles->is_admin === true)
                                            <button class="btn editbtn" id="editRating" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id={{ $rating->id }}><i class="fas fa-pencil-alt" style="font-size: 1.3em"></i></button>
                                            <button class="btn deletebtn" id="deleteRating" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id={{ $rating->id }}><i class="fas fa-trash-alt" style="font-size: 1.3em"></i></button>
                                        @endif
                                        {{ $rating->created_at }}
                                    </small>
                                    @endauth
                                </div>
                                <p class="mb-1">{{ $rating->opinion }}</p>
                            </a>
                        @empty
                        <hr>
                            <h2 class="pt-1" style="font-weight: bold; text-align: center">Brak opinii. Wystaw pierwszą opinię dla tego produktu!</h2>
                        @endforelse
                    </div>
                </div>
                @isset($rating)
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edycja opinii</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/rating/edit" class="mb-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">

                                        <div class="form-group row pt-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Ocena</label>

                                            <div class="col-4 star-rating">
                                                <input type="radio" id="5-stars" name="rate" value="5" />
                                                <label for="5-stars" class="star">&#9733;</label>
                                                <input type="radio" id="4-stars" name="rate" value="4" />
                                                <label for="4-stars" class="star">&#9733;</label>
                                                <input type="radio" id="3-stars" name="rate" value="3" />
                                                <label for="3-stars" class="star">&#9733;</label>
                                                <input type="radio" id="2-stars" name="rate" value="2" />
                                                <label for="2-stars" class="star">&#9733;</label>
                                                <input type="radio" id="1-star" name="rate" value="1" />
                                                <label for="1-star" class="star">&#9733;</label>
                                            </div>
                                        </div>

                                        <div class="form-group row pt-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Opinia</label>
                                            <div class="col-md-6 opinion">
                                                <input id="opinion" type="text" class="form-control"
                                                    name="opinion" value="{{ $rating->opinion }}" required autocomplete="opinion" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $rating->product_id }}">
                                    <div class="col-12 pt-3" style="justify-content: center; text-align: center;">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">Zamknij</button>
                                        <button type="submit" class="btn btn-success">Edytuj opinię</button>
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
                                <h5 class="modal-title" id="deleteModalLabel">Usuwanie opinii</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                                <p class="pt-4" style="font-size: 24px">Czy chcesz usunąć tę opinię?</p>
                            </div>
                            <div class="modal-footer" style="justify-content: center">
                                <form method="POST" action="/rating/delete" class="mb-3">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $rating->product_id }}">
                                    <button type="submit" class="btn btn-success">TAK</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NIE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
<style>
        .star-rating {
            display:flex;
            flex-direction: row-reverse;
            font-size:2.5em;
            justify-content:center;
        }

        .star-rating input {
            display:none;
        }

        .star-rating label {
            color:#ccc;
            cursor:pointer;
        }

        .star-rating :checked ~ label {
            color:#f90;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color:#fc0;
        }
</style>

<script>
    /*document.querySelector("#addProductToastBtn").onclick = function() {
        new bootstrap.Toast(document.querySelector('#addProductToast')).show();
    }*/

    $(document).on("hidden.bs.modal", "#editModal", function () {
        $(this).find("input[type=radio]")
        .prop("checked", "")
        .end();
    });

    $(document).ready(function () {
        var editModal = document.getElementById('editModal')
        var deleteModal = document.getElementById('deleteModal')

        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            $.get('/product/rating/' + id + '', function (data) {
                var inputOpinion = editModal.querySelector('.opinion input')
                inputOpinion.value = data.opinion
                var inputID = editModal.querySelector('.modal-body form')
                inputID.action = '/rating/edit/' + data.id
            })
        });

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            $.get('rating/' + id + '', function (data) {
            var inputID = deleteModal.querySelector('.modal-footer form')
            inputID.action = '/rating/delete/' + data.id
            })
        });
    });
</script>
@endsection
