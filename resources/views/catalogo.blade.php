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
            <input type="submit" value="CERCA">
            <button id=close-button type="button" onclick="document.getElementById('filtri').style.display='none'">X</button>
        </form>
    </div>

    <button id=filter-button type="button" onclick="document.getElementById('filtri').style.display='block'">FILTRI</button>
    <hr id=spacing>
    <div id=rectangle>
        <!-- offerta esempio, impostazione iniziale oggetti-->
        <img src="https://www.doctorswork.it/wp-content/uploads/2020/06/img-box-qua-250x253.png" width="100px" height="100px">

        @if(session()->has('ricercaAzienda'))
            <div>{{session('ricercaAzienda')[0]['idCoupon']}}</div>
        @else
            <div>{{session('Errore')}}</div>
        @endif
        <p>Nome Coupon:  </p>
        <p>ID offerta: </p>
        <p>Nome Azienda: </p>
        <button>Prendi Offerta</button>
    </div>
    <hr id=spacing>
@endsection
</html>
