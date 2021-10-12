@extends('layouts.app')

@section('content')
    <div class="container" style="justify-content: center; text-align: center; display: flex;">
        <div class="card mb-3" style="max-width: 750px">
            <div class="card-header" style="text-align: center">
                <a class="navbar-brand">
                    <span style="color: rgb(158, 91, 2)">
                        <i class="ps-2" style="font-size: 24px; font-family: 'Vegan Style Personal Use', sans-serif;">O firmie</i>
                    </span>
                </a>
            </div>
            <div class="card-center" style="display: inline-flex">
                <div id="carousel-furniture" class="row g-0 carousel slide col-md-6" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/furniture/vase.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/furniture/accessories.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/furniture/posters.jpg" class="d-block w-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="card-body">
                        <p> Jesteśmy świetnie prosperującą firmą na rynku meblowym, która funkcjonuje już od niespełna 20 lat. Przez ten czas
                            zdążyliśmy zdobyć cenne doświadczenie oraz profesjonalny zespół pracowników. </p>
                        <p> Na pierwszym miejscu stawiany jest klient oraz jego oczekiwania. Uzyskujemy to poprzez profesjonalną obsługę, atrakcyjną ofertę oraz najwyższej jakości produkty. </p>
                        <p> Firma wyszła na przeciw panującym na rynku mebli standardom i stworzyła niedrogie, a zarazem estetyczne meble najwyższej jakości. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
