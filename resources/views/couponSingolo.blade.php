<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\couponSingolo.css') }}">
@endsection

@section('content')


    @if(session()->has('coupon'))
        <div class="header_coupon">
            <div class="nomeCoupon"><h1>{{session('coupon')['nomeOfferta']}}</h1></div>
            <div class="scadenza"> Scadenza: {{session('coupon')['scadenza']}}</div>
        </div>
        <br>
        <br>
        <body>
        <div class="descrizione_offerta">
            <br>
            {{session('coupon')['descrizioneOfferta']}}
        </div>
        </body>
        <div class="footer_coupon">
            <div class="scontistica">{{session('coupon')['scontistica']}}%</div>
            <div class="bottone_indietro"><button  onclick="location.href='{{route('profile')}}';">Indietro</button> </div>
        </div>
    @endif



@endsection
</html>
