<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\visualizzaPromozione.css') }}">
@endsection

@section('content')

    @if(session()->has('couponRichiesto'))
        <div><p>Nome Offerta:{{session('couponRichiesto')['idCoupon']}}</p></div>
        <div><p>Azienda: {{session('couponRichiesto')['idAzienda']}}</p></div>
        <div><p>Descrizione offerta:{{session('couponRichiesto')['oggetto']}}</p></div>
        <div><p>Modalità offerta: {{session('couponRichiesto')['modalità']}}</p></div>
        <div><p>Sconto: {{session('couponRichiesto')['scontistica']}}</p></div>
        <div><p>QrCode: {{session('couponRichiesto')['qrCode']}}</p></div>
        <div><p>Usufruibile presso: {{session('couponRichiesto')['luogoFruizione']}}</p></div>
        <div><p>Nel periodo: {{session('couponRichiesto')['tempoFruizione']}}</p></div>
    @endif

@endsection
</html>
