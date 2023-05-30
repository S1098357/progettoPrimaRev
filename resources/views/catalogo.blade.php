<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\catalogo.css') }}">
@endsection

@section('content')
    <div id="filtri" class="filtri">
        <form action="{{route('filtri')}}" method="POST" class="form"> <!-- Tramite la route viene richiamata la funzione filtriPost in metodo post e quindi la ricerca per nome azienda e parole chiave -->
            @csrf
            <p>Barra di ricerca per le parole chiave</p>
            <label>Cerca nome azienda</label>
            <input type="text" name="ricercaAzienda"/>
            <label>Cerca parola chiave</label>
            <input type="text" name="ricercaParola"/>
            <input type="submit" value="CERCA">
            <button id=close-button type="button" onclick="document.getElementById('filtri').style.display='none'">X</button>
        </form>
    </div>
        <button id=filter-button type="button" onclick="document.getElementById('filtri').style.display='block'">FILTRI</button>
        <!-- offerta esempio, impostazione iniziale oggetti-->
    <br>
        @if(session()->has('couponPassati'))
            @for($i=0;$i<=sizeof(session('couponPassati'))-1;$i++)
                <div class="offerta">
                    <div><p>Nome Offerta:{{session('couponPassati')[$i]['idCoupon']}}</p></div>
                    <div><p>Azienda: {{session('couponPassati')[$i]['idAzienda']}}</p></div>
                    <div><p>Descrizione offerta:{{session('couponPassati')[$i]['oggetto']}}</p></div>
                    <div><p>Modalità offerta: {{session('couponPassati')[$i]['modalità']}}</p></div>
                    <div><p>Sconto: {{session('couponPassati')[$i]['scontistica']}}</p></div>
                    <div><p>QrCode: {{session('couponPassati')[$i]['qrCode']}}</p></div>
                    <div><p>Usufruibile presso: {{session('couponPassati')[$i]['luogoFruizione']}}</p></div>
                    <div><p>Da riscuotere entro: {{session('couponPassati')[$i]['dataScadenza']}}</p></div>
                    @if(Auth::user())
                        <div><button type="submit" value="Salva coupon" onclick="location.href='{{route('salvaCoupon', ['id'=>session('couponPassati')[$i]['idCoupon']])}}';"></button></div>
                    @endif
                </div>
            @endfor
        @elseif(session()->has('Errore'))
            <center><div class="errore">{{session('Errore')}}</div></center>
        @else
            <?php $info = \App\Models\Coupon::all(); ?>
            @foreach($listaPromozioni as $promozione)
                <div class="offerta">
                    <div><p>Nome Offerta:{{$promozione->idCoupon}}</p></div>
                    <div><p>Azienda: {{$promozione->idAzienda}}</p></div>
                    <div><p>Descrizione offerta:{{$promozione->oggetto}}</p></div>
                    <div><p>Modalità offerta: {{$promozione->modalità}}</p></div>
                    <div><p>Sconto: {{$promozione->scontistica}}</p></div>
                    <div><p>QrCode: {{$promozione->qrCode}}</p></div>
                    <div><p>Usufruibile presso: {{$promozione->luogoFruizione}}</p></div>
                    <div><p>Da riscuotere entro: {{$promozione->dataScadenza}}</p></div>
                    @if(Auth::user())
                        <div><button type="submit" onclick="location.href='{{route('salvaCoupon', ['id'=>$info[$i]['idCoupon']])}}';">Salva coupon</button></div>
                    @endif
                </div>
            @endforeach
        @endif
    <br>
    <br>
    <br>
    <br>
@endsection
</html>
