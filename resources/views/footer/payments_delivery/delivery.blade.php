@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="pb-3" style="text-align: center">Czas i koszty dostawy</h1>

    <h3>Czas dostawy</h3>
    <p>Czas realizacji zamówienia jest liczony od momentu zaksięgowania wpłaty wynosi <span style="font-weight: bold"> do 7 dni roboczych </span>(od poniedziałku do piątku z wyłączeniem dni ustawowo wolnych od pracy).</p>
    <p>Wszystkie zamówienia złożone i opłacone <span style="font-weight: bold"> do godziny 12:00 </span> wysyłamy tego samego dnia od poniedziałku do piątku. Zamówienia złożone w weekend wysyłane są w poniedziałki.</p>
    <p>Na życzenie klienta możemy wysłać paczkę kurierem DHL lub DPD, po wcześniejszej konsultacji telefonicznej.</p>

    <h3>Koszty dostawy</h3>
    <p>Koszt dostawy uzależniony jest od kwoty całego zamówienia oraz sposobu wysyłki.</p>
    <p>W przypadku wartości towaru <span style="font-weight: bold"> nie przekraczającej 500 zł </span>, koszt dostawy wynosi odpowiednio <span style="font-weight: bold"> 50 zł i 80 zł </span> (wybór opcji z wniesieniem mebli przez dostawcę, stąd 30 zł więcej).</p>
    <p>Gdy przesyłka w całości wyniesie <span style="font-weight: bold"> powyżej 500 zł </span>, dostawa jest <span style="font-weight: bold"> darmowa </span>. Za <span style="font-weight: bold"> dopłatą 30 zł </span>, istnieje możliwość wniesienia przesyłki do mieszkania przez kuriera.</p>
</div>
@endsection
