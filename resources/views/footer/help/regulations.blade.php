@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="pb-3" style="text-align: center">Regulamin</h1>
    <hr>
    <div class="regulations">
        <h3 class="paragraph">§ 1</h3>
        <h3 class="paragraph">DEFINICJE</h3>
            <li><span class="word">Konsument</span> ​- osoba fizyczna zawierająca ze Sprzedawcą umowę w ramach Sklepu,
            której przedmiot nie jest związany bezpośrednio z jej działalnością gospodarczą lub
            zawodową.</li>
            <li><span class="word">Sprzedawca</span> - osoba fizyczna z siedzibą we Wrocławiu przy ul. Admiralska 1, kod pocztowy 51-218, wpisany do Krajowego Rejestru Sądowego przez Sąd Rejonowy.</li>
            <li><span class="word">Klient</span> ​- każdy podmiot dokonujący zakupów za pośrednictwem Sklepu.</li>
            <li><span class="word">Przedsiębiorca</span> ​- osoba fizyczna, osoba prawna i jednostka organizacyjna
            niebędąca osobą prawną, której odrębna ustawa przyznaje zdolność prawną,
            wykonująca we własnym imieniu działalność gospodarczą, która korzysta ze Sklepu.</li>
            <li><span class="word">Sklep</span> ​- sklep internetowy prowadzony przez Sprzedawcę pod adresem
            internetowym www.sklep-meblowy.pl</li>
            <li><span class="word">Umowa zawarta na odległość</span> - umowa zawarta z Klientem w ramach
            zorganizowanego systemu zawierania umów na odległość (w ramach Sklepu), bez
            jednoczesnej fizycznej obecności stron, z wyłącznym wykorzystaniem jednego lub
            większej liczby środków porozumiewania się na odległość do chwili zawarcia umowy
            włącznie.</li>
            <li><span class="word">Regulamin</span> ​- niniejszy regulamin Sklepu.</li>
            <li><span class="word">Zamówienie</span> ​- oświadczenie woli Klienta składane za pomocą Formularza
            Zamówienia i zmierzające bezpośrednio do zawarcia Umowy Sprzedaży Produktu
            lub Produktów ze Sprzedawcą.</li>
            <li><span class="word">Konto</span> - konto klienta w Sklepie, są w nim gromadzone są dane podane przez
            Klienta oraz informacje o złożonych przez niego Zamówieniach w Sklepie.</li>
            <li><span class="word">Formularz rejestracji</span> ​- formularz dostępny w Sklepie, umożliwiający utworzenie
            Konta.</li>
            <li><span class="word">Formularz zamówienia</span> - interaktywny formularz dostępny w Sklepie umożliwiający
            złożenie Zamówienia, w szczególności poprzez dodanie Produktów do Koszyka oraz
            określenie warunków Umowy Sprzedaży, w tym sposobu dostawy.</li>
            <li><span class="word">Koszyk</span> ​– element oprogramowania Sklepu, w którym widoczne są wybrane przez
            Klienta Produkty do zakupu, a także istnieje możliwość ustalenia i modyfikacji danych
            Zamówienia, w szczególności ilości produktów.</li>
            <li><span class="word">Produkt</span> ​- dostępna w Sklepie rzecz ruchoma/usługa będąca przedmiotem Umowy
            Sprzedaży między Klientem a Sprzedawcą.</li>
            <li><span class="word">Umowa Sprzedaży</span> - umowa sprzedaży Produktu zawierana albo zawarta między Klientem a Sprzedawcą za pośrednictwem Sklepu internetowego. Przez Umowę
            Sprzedaży rozumie się też - stosowanie do cech Produktu - umowę o świadczenie
            usług i umowę o dzieło.</li>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 2</h3>
        <h3 class="paragraph">KONTAKT ZE SKLEPEM</h3>
            <li>1. Adres Sprzedawcy: 51-218 Wrocław, ul. Admiralska 1.</li>
            <li>2. Adres e-mail Sprzedawcy: sklep-meblowy@gmail.com.</li>
            <li>3. Numer telefonu Sprzedawcy: +48 667 744 888.</li>
            <li>4. Numer fax Sprzedawcy (88) 888-88-88.</li>
            <li>5. Numer rachunku bankowego Sprzedawcy 00 1111 2222 3333 4444 5555 6666.</li>
            <li>6. Klient może porozumiewać się ze Sprzedawcą za pomocą adresów i numerów
            telefonów podanych w niniejszym paragrafie lub w zakładce <span class="word"> O NAS - Kontakt i dane firmy</span>.</li>
            <li>7. Klient może porozumieć się telefonicznie ze Sprzedawcą od poniedziałku do piątku w godzinach od 10:00 do 18:00 oraz w soboty od 12:00 do 16:00.</li>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 3</h3>
        <h3 class="paragraph">WYMAGANIA TECHNICZNE</h3>
            <p>Do korzystania ze Sklepu, w tym przeglądania asortymentu Sklepu oraz składania
            zamówień na Produkty, niezbędne są:</p>
            <li class="list">urządzenie końcowe z dostępem do sieci Internet i przeglądarka internetowa,</li>
            <li class="list">aktywne konto poczty elektronicznej (e-mail)</li>
            <li class="list">włączona obsługa plików cookies</li>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 4</h3>
        <h3 class="paragraph">INFORMACJE OGÓLNE</h3>
            <p>1. Sprzedawca w najszerszym dopuszczalnym przez prawo zakresie nie ponosi
            odpowiedzialności za zakłócenia w tym przerwy w funkcjonowaniu Sklepu spowodowane siłą wyższą, niedozwolonym działaniem osób trzecich lub niekompatybilnością Sklepu internetowego z infrastrukturą techniczną Klienta.</p>
            <p>2. Przeglądanie asortymentu Sklepu nie wymaga zakładania Konta. Składanie
            zamówień przez Klienta na Produkty znajdujące się w asortymencie Sklepu możliwe
            jest albo po założeniu Konta zgodnie z postanowieniami § 6 Regulaminu albo przez
            podanie niezbędnych danych osobowych i adresowych umożliwiających realizację
            Zamówienia bez zakładania Konta.</p>
            <p>3. Ceny podane w Sklepie są podane w polskich złotych i są cenami brutto
            (uwzględniają podatek VAT).</p>
            <p>4. Na końcową (ostateczną) kwotę do zapłaty przez Klienta składa się cena za Produkt
            oraz koszt dostawy (w tym opłaty za transport, dostarczenie i usługi pocztowe), o
            której Klient jest informowany na stronach Sklepu w trakcie składania Zamówienia, w
            tym także w chwili wyrażenia woli związania się Umową Sprzedaży.</p>
            <p>5. W przypadku Umowy obejmującej prenumeratę lub świadczenie usług na czas
            nieoznaczony końcową (ostateczną) ceną jest łączna cena obejmująca wszystkie
            płatności za okres rozliczeniowy.</p>
            <p>6. Gdy charakter przedmiotu Umowy nie pozwala, rozsądnie oceniając, na
            wcześniejsze obliczenie wysokości końcowej (ostatecznej) ceny, informacja o
            sposobie, w jaki cena będzie obliczana, a także o opłatach za transport,
            dostarczenie, usługi pocztowe oraz o innych kosztach, będzie podana w Sklepie w
            opisie Produktu.</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 5</h3>
        <h3 class="paragraph">ZAKŁADANIE KONTA W SKLEPIE</h3>
            <p>1. Aby założyć Konto w Sklepie, należy wypełnić Formularz rejestracji.</p>
            <p>2. Założenie Konta w Sklepie jest darmowe.</p>
            <p>3. Logowanie się na Konto odbywa się poprzez podanie loginu i hasła ustanowionych w
            Formularzu rejestracji.</p>
            <p>4. Klient ma możliwość w każdej chwili, bez podania przyczyny i bez ponoszenia z tego
            tytułu jakichkolwiek opłat usunąć Konto poprzez wysłanie stosownego żądania do
            Sprzedawcy, w szczególności za pośrednictwem poczty elektronicznej lub pisemnie
            na adresy podane w § 3.</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 6</h3>
        <h3 class="paragraph">ZASADY SKŁADANIA ZAMÓWIENIA</h3>
            <p>W celu złożenia Zamówienia należy:</p>
            <li>1. zalogować się do Sklepu;</li>
            <li>2. wybrać Produkt będący przedmiotem Zamówienia, a następnie kliknąć przycisk „Do
            koszyka” (lub równoznaczny);</li>
            <li>3. kliknąć przycisk “Zapłać”</li>
            <li>4. wybrać jeden z dostępnych sposobów dostawy, a następnie opłacić zamówienie w określonym terminie, z zastrzeżeniem § 8 pkt 3.</li>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 7</h3>
        <h3 class="paragraph">OFEROWANE METODY DOSTAWY I PŁATNOŚCI</h3>
            <p>1. Klient może skorzystać z następujących metod dostawy lub odbioru zamówionego
            Produktu:
            <li class="list">Odbiór osobisty</li>
            <li class="list">Kurier - bez wniesienia</li>
            <li class="list">Kurier - z wniesieniem</li></p>
            <p>2. Klient może skorzystać z następujących metod płatności:
            <li class="list">Płatność kartą płatniczą</li>
            <li class="list">Płatność przelewem na konto Sprzedawcy</li></p>
            <p>3. Szczegółowe informacje na temat metod dostawy oraz akceptowalnych metod płatności
            znajdują się za stronach Sklepu.</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 8</h3>
        <h3 class="paragraph">WYKONANIE UMOWY SPRZEDAŻY</h3>
            <p>1. Zawarcie Umowy Sprzedaży między Klientem a Sprzedawcą następuje po
            uprzednim złożeniu przez Klienta Zamówienia za pomocą Formularza zamówienia w
            Sklepie internetowym zgodnie z § 7 Regulaminu.</p>
            <p>2. Po złożeniu Zamówienia Sprzedawca niezwłocznie potwierdza jego otrzymanie oraz
            jednocześnie przyjmuje Zamówienie do realizacji. Potwierdzenie otrzymania
            Zamówienia i jego przyjęcie do realizacji następuje poprzez przesłanie przez
            Sprzedawcę Klientowi stosownej wiadomości e-mail na podany w trakcie składania
            Zamówienia adres poczty elektronicznej Klienta, która zawiera co najmniej
            oświadczenia Sprzedawcy o otrzymaniu Zamówienia i o jego przyjęciu do realizacji
            oraz potwierdzenie zawarcia Umowy Sprzedaży. Z chwilą otrzymania przez Klienta
            powyższej wiadomości e-mail zostaje zawarta Umowa Sprzedaży między Klientem a
            Sprzedawcą.</p>
            <p>3. W przypadku wyboru przez Klienta płatności przelewem albo płatności kartą płatniczą, Klient
            obowiązany jest do dokonania płatności w terminie 7 dni kalendarzowych od dnia
            zawarcia Umowy Sprzedaży - w przeciwnym razie zamówienie zostanie anulowane</p>
            <p>4. Jeżeli Klient wybrał sposób dostawy inny niż odbiór osobisty, Produkt zostanie
            wysłany przez Sprzedawcę w terminie wskazanym w jego opisie (z zastrzeżeniem
            ustępu 5 niniejszego paragrafu), w sposób wybrany przez Klienta podczas składania
            Zamówienia.</p>
            <p>5. A W przypadku zamówienia Produktów o różnych terminach dostawy, terminem
            dostawy jest najdłuższy podany termin. Klient ma
            możliwość żądania dostarczenia Produktów częściami lub też dostarczenia wszystkich
            Produktów po skompletowaniu całego zamówienia.</p>
            <p>6. Początek biegu terminu dostawy Produktu do Klienta liczy się w następujący sposób: W przypadku wyboru przez Klienta sposobu płatności przelewem lub kartą płatniczą - od dnia uznania rachunku bankowego Sprzedawcy.</p>
            <p>7. W przypadku wyboru przez Klienta odbioru osobistego Produktu, Produkt będzie gotowy
            do odbioru przez Klienta w terminie wskazanym w opisie Produktu. O gotowości Produktu do
            odbioru Klient zostanie dodatkowo poinformowany przez Sprzedawcę poprzez przesłanie
            stosownej wiadomości e-mail na podany w trakcie składania Zamówienia adres poczty
            elektronicznej Klienta.</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 9</h3>
        <h3 class="paragraph">PRAWO ODSTĄPIENIA OD UMOWY</h3>
            <p>1. Konsument może w terminie 14 dni odstąpić od Umowy Sprzedaży bez podania
            jakiejkolwiek przyczyny.</p>
            <p>2. Bieg terminu określonego w ust. 1 rozpoczyna się od dostarczenia Produktu
            Konsumentowi lub wskazanej przez niego osobie innej niż przewoźnik.</p>
            <p>3. W przypadku Umowy, która obejmuje wiele Produktów, które są dostarczane
            osobno, partiami lub w częściach, termin wskazany w ust. 1 biegnie od dostawy
            ostatniej rzeczy, partii lub części.</p>
            <p>4. W przypadku Umowy, która polega na regularnym dostarczaniu Produktów przez
            czas oznaczony (prenumerata), termin wskazany w ust. 1 biegnie od objęcia w
            posiadanie pierwszej z rzeczy.</p>
            <p>5. Konsument może odstąpić od Umowy, składając Sprzedawcy oświadczenie o
            odstąpieniu od Umowy. Do zachowania terminu odstąpienia od Umowy wystarczy
            wysłanie przez Konsumenta oświadczenia przed upływem tego terminu.</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 10</h3>
        <h3 class="paragraph">REKLAMACJA I GWARANCJA</h3>
            <p>1. Umową Sprzedaży objęte są nowe Produkty.</p>
            <p>2. Sprzedawca jest obowiązany dostarczyć Klientowi rzecz wolną od wad.</p>
            <p>3. W przypadku wystąpienia wady zakupionego u Sprzedawcy towaru Klient ma prawo
            do reklamacji w oparciu o przepisy dotyczące rękojmi w kodeksie cywilnym.</p>
            <p>4. Reklamację należy zgłosić pisemnie lub drogą elektroniczną na podane w niniejszym
            Regulaminie adresy Sprzedawcy.</p>
            <p>5. Zaleca się, aby w reklamacji zawrzeć m.in. zwięzły opis wady, okoliczności (w tym
            datę) jej wystąpienia, dane Klienta składającego reklamację, oraz żądanie Klienta w
            związku z wadą towaru.</p>
            <p>6. Sprzedawca ustosunkuje się do żądania reklamacyjnego niezwłocznie, nie później
            niż w terminie 14 dni, a jeśli nie zrobi tego w tym terminie, uważa się, że żądanie
            Klienta uznał za uzasadnione.</p>
            <p>7. Towary odsyłane w ramach procedury reklamacyjnej należy wysyłać na adres
            podany w § 3 niniejszego Regulaminu.</p>
            <p>8. W przypadku, gdy na Produkt została udzielona gwarancja, informacja o niej, a także
            jej treść, będą zawarte przy opisie Produktu w Sklepie.</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 11</h3>
        <h3 class="paragraph">DANE OSOBOWE W SKLEPIE INTERNETOWYM</h3>
            <p>1. Administratorem danych osobowych Klientów zbieranych za pośrednictwem Sklepu
            internetowego jest Sprzedawca.</p>
            <p>2. Dane osobowe Klientów zbierane przez administratora za pośrednictwem Sklepu
            internetowego zbierane są w celu realizacji Umowy Sprzedaży, a jeżeli Klient wyrazi na to
            zgodę - także w celu marketingowym.</p>
            <p>3. Odbiorcami danych osobowych Klientów Sklepu internetowego mogą być:
            a. W przypadku Klienta, który korzysta w Sklepie internetowym ze sposobu dostawy
            przesyłką pocztową lub przesyłką kurierską, Administrator udostępnia zebrane dane
            osobowe Klienta wybranemu przewoźnikowi lub pośrednikowi realizującemu
            przesyłki na zlecenie Administratora.
            b. W przypadku Klienta, który korzysta w Sklepie internetowym ze sposobu płatności
            elektronicznych lub kartą płatniczą Administrator udostępnia zebrane dane osobowe
            Klienta, wybranemu podmiotowi obsługującemu powyższe płatności w Sklepie
            internetowym.</p>
            <p>4. Klient ma prawo dostępu do treści swoich danych oraz ich poprawiania.</p>
            <p>5. Podanie danych osobowych jest dobrowolne, aczkolwiek niepodanie wskazanych w
            Regulaminie danych osobowych niezbędnych do zawarcia Umowy Sprzedaży skutkuje
            brakiem możliwości zawarcia tejże umowy</p>
    </div>

    <div class="regulations">
        <h3 class="paragraph">§ 12</h3>
        <h3 class="paragraph">POSTANOWIENIA KOŃCOWE</h3>
            <p>1. Umowy zawierane poprzez Sklep internetowy zawierane są w języku polskim.</p>
            <p>2. Sprzedawca zastrzega sobie prawo do dokonywania zmian Regulaminu z ważnych
            przyczyn to jest: zmiany przepisów prawa, zmiany sposobów płatności i dostaw - w zakresie,
            w jakim te zmiany wpływają na realizację postanowień niniejszego Regulaminu. O każdej
            zmianie Sprzedawca poinformuje Klienta z co najmniej 7 dniowym wyprzedzeniem.</p>
            <p>3. W sprawach nieuregulowanych w niniejszym Regulaminie mają zastosowanie
            powszechnie obowiązujące przepisy prawa polskiego, w szczególności: Kodeksu cywilnego;
            ustawy o świadczeniu usług drogą elektroniczną; ustawy o prawach konsumenta, ustawy o
            ochronie danych osobowych.</p>
            <p>4. Klient ma prawo skorzystać z pozasądowych sposobów rozpatrywania reklamacji i
            dochodzenia roszczeń. W tym celu może złożyć skargę za pośrednictwem unijnej platformy
            internetowej ODR dostępnej pod adresem: http://ec.europa.eu/consumers/odr/</p>
    </div>
</div>
<style>
    .word {
        font-weight: bold;
    }
    .paragraph {
        font-weight: bold;
        text-align: center;
    }
    li {
        list-style-type: none;
    }
    .list {
        list-style-type: disc;
    }
    .regulations {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
@endsection
