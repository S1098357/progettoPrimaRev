<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\home.css') }}">
@endsection
@section('content')

    <h1>Home</h1>
    <div class="zone">
        <h2>Descrizione sito</h2>
        <p>Benvenuto su CouponBeast! Qua troverai i migliori coupon di ogni azienda</p>
    </div>
    <br>
    <div class="zone">
        <h2>Funzionalità del Sito</h2>
        <p>Tra le funzionalità del sito potrai:</p>
            <p>Creare un account</p>
            <p>Accedere ad un sacco di promozioni diverse!</p>
            <p>Acquisire coupon e stamparli</p>

    </div>




@endsection

</html>

