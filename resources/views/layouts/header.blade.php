<header style="display: block">
    <nav class="py-2 px-3 navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="width: 1500px">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span style="color: rgb(158, 91, 2)">
                    <i class="fas fa-couch" style="font-size: 2em;"></i>
                    <i class="ps-2" style="font-size: 24px; font-family: 'Vegan Style Personal Use', sans-serif;">Sklep meblowy</i>
                </span>
            </a>
            <div class="collapse navbar-collapse ps-5">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Meble
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Kuchenne</a></li>
                            <li><a class="dropdown-item" href="#">Pokojowe</a></li>
                            <li><a class="dropdown-item" href="#">Sypialniane</a></li>
                            <li><a class="dropdown-item" href="#">Łazienkowe</a></li>
                            <li><a class="dropdown-item" href="#">Ogrodowe</a></li>
                            <li><a class="dropdown-item" href="#">Biurowe</a></li>
                            <li><a class="dropdown-item" href="#">Dziecięce</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Inne</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Akcesoria i dekoracje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promocje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nowości</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Szukaj</button>
                </form>
                <ul style="font-size: 2em; margin: 0">
                    <li class="far fa-user-circle"></li>
                    <li class="fas fa-shopping-cart"></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
