<header style="display: block; background-color: #F5F5F5">
    <div class="container">
        <nav class="py-2 px-3 navbar navbar-expand-lg navbar-light">
            <div class="container-fluid" style="width: 1500px">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span style="color: rgb(158, 91, 2)">
                        <i class="fas fa-couch" style="font-size: 2em"></i>
                        <i class="ps-2" style="font-size: 24px; font-family: 'Vegan Style Personal Use', sans-serif;">Sklep meblowy</i>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="text-align: center">
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="/furniture">Meble</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/contact">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/company">O firmie</a>
                        </li>
                    </ul>
                    <div class="dropdown" style="text-align: center">
                        <ul style="margin: 0; display: inline-flex; padding-left: 0px">
                            <a class="nav-link link-dark" style="font-size: 2em" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <li class="far fa-user-circle"></li>
                            </a>
                            <ul class="dropdown-menu" style="text-align: center" aria-labelledby="navbarScrollingDropdown">
                                <ul class="navbar-nav ml-auto" style="justify-content: center; display: inline-block">
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">Zaloguj się</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/register">Zarejestruj się</a>
                                    </li>
                                    @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" aria-current="page" href="/profile/user_orders">Historia zamówień</a>

                                        <a class="nav-link" href="/profile/contact_details">Dane wysyłkowe</a>

                                        <a class="nav-link" style="color: black" href="/logout"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj
                                            się</a>

                                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                        <hr>
                                        <button class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                            data-bs-target="#deleteAccountModal" style="font-weight: bold">USUŃ KONTO</button>
                                    </li>
                                    @endguest
                                </ul>
                            </ul>
                            <a class="nav-link link-dark" style="font-size: 2em" href="/cart/show">
                                <li class="fas fa-shopping-cart"></li>
                                @if(Cart::content()->count() > 0)
                                <span class="position-absolute start-10 translate-middle badge rounded-pill bg-danger"
                                    style="font-size: 0.5em">
                                    {{ Cart::content()->count() }}
                                    <span class="visually-hidden"></span>
                                </span>
                                @endif
                            </a>
                            @auth
                            @if (auth()->user()->roles->is_admin === true)
                            <div class="btn-group">
                            <a class="nav-link link-dark" style="font-size: 2em" href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <li class="fas fa-cog"></li>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/admin_panel/categories"><i class="fas fa-th-large"></i> Kategorie</a></li>
                                <li><a class="dropdown-item" href="/admin_panel/subcategories"><i class="fas fa-th-list"></i> Podkategorie</a>
                                </li>
                                <li><a class="dropdown-item" href="/admin_panel/customers"><i class="fas fa-users"></i> Klienci</a></li>
                                <li><a class="dropdown-item" href="/admin_panel/orders"><i class="fas fa-clipboard-check"></i> Zamówienia</a>
                                </li>
                                <li><a class="dropdown-item" href="/admin_panel/products"><i class="fas fa-box-open"></i> Produkty</a></li>
                                <li><a class="dropdown-item" href="/admin_panel/questions"><i class="fas fa-question"></i></i> Pytania</a></li>
                            </ul>
                            </div>
                            @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        @auth
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Usuwanie konta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                        <i class="fas fa-exclamation-triangle" style="color: red; font-size: 2em"></i>
                        <p class="pt-4" style="font-size: 24px">Czy na pewno chcesz usunąć swoje konto?</p>
                    </div>
                    <div class="modal-footer" style="justify-content: center">
                        <form method="POST" action="/account-delete" class="mb-3">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-success">TAK</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NIE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
</header>
