<header style="display: block">
    <nav class="py-2 px-3 navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="width: 1500px">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span style="color: rgb(158, 91, 2)">
                    <i class="fas fa-couch" style="font-size: 2em"></i>
                    <i class="ps-2" style="font-size: 24px; font-family: 'Vegan Style Personal Use', sans-serif;">Sklep meblowy</i>
                </span>
            </a>
            <div class="collapse navbar-collapse ps-5">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="/furniture">Meble</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promocje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nowości</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <ul style="margin: 0; display: inline-flex">
                        <a class="nav-link link-dark" style="font-size: 2em" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <a id="navbarDropdown" class="nav-link" href="/profile" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                        </a>

                                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj się</a>

                                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </ul>
                        <a class="nav-link link-dark" style="font-size: 2em" href="/cart/show">
                            <li class="fas fa-shopping-cart"></li>
                            @if(Cart::content()->count() > 0)
                            <span class="position-absolute start-10 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5em">
                                {{ Cart::content()->count() }}
                                <span class="visually-hidden"></span>
                            </span>
                            @endif
                        </a>
                    </ul>
                </div>
                @auth
                <div class="btn-group">
                    <a class="nav-link link-dark" style="font-size: 2em" href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <li class="fas fa-cog"></li>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/admin_panel/categories"><i class="fas fa-th-large"></i> Kategorie</a></li>
                        <li><a class="dropdown-item" href="/admin_panel/subcategories"><i class="fas fa-th-list"></i> Podkategorie</a></li>
                        <li><a class="dropdown-item" href="/admin_panel/customers"><i class="fas fa-users"></i> Klienci</a></li>
                        <li><a class="dropdown-item" href="/admin_panel/orders"><i class="fas fa-clipboard-check"></i> Zamówienia</a></li>
                        <li><a class="dropdown-item" href="/admin_panel/products"><i class="fas fa-box-open"></i> Produkty</a></li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
