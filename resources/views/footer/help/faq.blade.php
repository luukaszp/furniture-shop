@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="pb-3" style="text-align: center">Pytania i odpowiedzi</h1>
    <h4 style="font-weight: bold">1. W jakich godzinach pracuje obsługa sklepu meblowego?</h4>
    <p>Pracujemy od poniedziałku do piątku w godzinach od 10:00 do 18:00 oraz w soboty od 12:00 do 16:00. W tych godzinach działa nasz numer telefonu 667-744-888 oraz można wysłać zapytanie drogą e-mailową na adres sklep-meblowy@gmail.com.</p>

    <h4 style="font-weight: bold">2. Czy jest możliwość złożenia zamówienia innego niż internetowe?</h4>
    <p>Tak, zamówienie możemy przyjąć telefonicznie oraz poprzez e-mail.</p>
    <p>Abyśmy mogli przyjąć zamówienie potrzebujemy następujących informacji:</p>
        <ul>
            <li>imię i nazwisko adresata</li>
            <li>dokładny adres wraz z kodem pocztowym</li>
            <li>numer telefonu do kontaktu z kurierem</li>
            <li>nazwę produktu oraz zamawianą ilość produktów</li>
            <li>adres email (jeżeli jest dostępny, do przesłania potwierdzenia przyjęcia zamówienia i numeru listu nadawczego)</li>
        </ul>

    <h4 style="font-weight: bold">3. Czy towar mogę odebrać osobiście?</h4>
    <p>Tak, towar można odebrać osobiście. Podczas dokonywania zakupu towaru należy jako sposób dostawy wybrać <span style="font-weight: bold"> Odbiór Osobisty.</span> Adres sklepu meblowego znajduje się w zakładce <span style="font-weight: bold"> O NAS - Kontakt i dane firmy</span></p>

    <h4 style="font-weight: bold">4. Czy mogę zwrócić zakupiony towar?</h4>
    <p>Tak. Szczegóły dotyczące odstąpienia od umowy znajdą Państwo na stronie w zakładce <span style="font-weight: bold"> POMOC - Zwroty i reklamacje </span></p>

    <h4 style="font-weight: bold">5. Jaki jest czas realizacji zamówienia?</h4>
    <p>Czas realizacji zamówienia jest liczony od momentu zaksięgowania wpłaty wynosi <span style="font-weight: bold"> do 7 dni roboczych </span>(od poniedziałku do piątku z wyłączeniem dni ustawowo wolnych od pracy).</p>
</div>
@endsection
