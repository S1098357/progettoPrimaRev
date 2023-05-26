<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\statistiche.css') }}">
@endsection

@section('content')

    <?php $info = \App\Models\Coupon::all(); ?>
    <?php $infoUtenti = \App\Models\User::all(); ?>


    <div class="Titolo"><h1>Statistiche</h1></div>
    <div class="numeroCoupon">Numero totale di coupon emessi: 9</div>
    <hr>
    <div class="tipoStatistica">Seleziona il coupon di cui vuoi sapere le informazioni: </div>
    @for($i=0;$i<=sizeof($info)-1;$i++)
            <div class="promozione">
                <div><p id="idCoupon"> Nome offerta: {{$info[$i]['idCoupon']}} </p></div>
                <div><p id="oggetto"> Oggetto offerta: {{$info[$i]['oggetto']}} </p></div>
            </div>
    @endfor
    <hr>
    <div class="tipoStatistica">Seleziona l'utente di cui vuoi sapere le informazioni: </div>
    @for($i=0;$i<=sizeof($infoUtenti)-1;$i++)
        <div class="utente" >
            <div><p id="username"> Nome utente: {{$infoUtenti[$i]['username']}} </p></div>
            <div><p id="email"> Email: {{$infoUtenti[$i]['email']}} </p></div>
        </div>
    @endfor


@endsection
</html>
