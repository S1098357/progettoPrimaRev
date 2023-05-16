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
    <hr id=spacing>
    <div id=rectangle>
        <!-- offerta esempio, impostazione iniziale oggetti-->
        <img src="https://www.doctorswork.it/wp-content/uploads/2020/06/img-box-qua-250x253.png" width="100px" height="100px">

        @if(session()->has('couponPassati'))
            @for($i=0;$i<=sizeof(session('couponPassati'))-1;$i++)
            <div>{{session('couponPassati')[$i]['idCoupon']}}</div>
            <div>{{session('couponPassati')[$i]['idAzienda']}}</div>
            <div>{{session('couponPassati')[$i]['oggetto']}}</div>
                <div>{{session('couponPassati')[$i]['modalità']}}</div>
            <div>{{session('couponPassati')[$i]['scontistica']}}</div>
            <div>{{session('couponPassati')[$i]['qrCode']}}</div>
            <div>{{session('couponPassati')[$i]['luogoFruizione']}}</div>
            <div>{{session('couponPassati')[$i]['tempoFruizione']}}</div>
            @endfor
        @elseif(session()->has('Errore'))
            <div>{{session('Errore')}}</div>
        @else
            <?php $info = \App\Models\Coupon::all(); ?>
            @for($i=0;$i<=sizeof($info)-1;$i++)
                <div>{{$info[$i]['idCoupon']}}</div>
                <div>{{$info[$i]['idAzienda']}}</div>
                <div>{{$info[$i]['oggetto']}}</div>
                <div>{{$info[$i]['modalità']}}</div>
                <div>{{$info[$i]['scontistica']}}</div>
                <div>{{$info[$i]['qrCode']}}</div>
                <div>{{$info[$i]['luogoFruizione']}}</div>
                <div>{{$info[$i]['tempoFruizione']}}</div>
            @endfor
        @endif
    </div>
    <hr id=spacing>
@endsection
</html>
