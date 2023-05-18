<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\promozioni.css') }}">
@endsection

@section('content')

    <?php $info = \App\Models\Coupon::all(); ?>

    @for($i=0;$i<=sizeof($info)-1;$i++)
        <form action="{{route('Promozioni')}}" method="POST" class="form">
            @csrf
            <div class="promozione">
                <div><p> Nome offerta: {{$info[$i]['idCoupon']}} </p></div>
                <div><p> Oggetto offerta: {{$info[$i]['oggetto']}} </p></div>
                <div>
                    <div class="bottoni1"> <input type="submit" value="MODIFICA" formaction="{{route('visualizzaPromozione')}}"> </div>
                    <div class="bottoni2"> <input type="submit" value="VISUALIZZA" formaction="{{route('visualizzaPromozione')}}"> </div>
                </div>
            </div>
        </form>
    @endfor
    <form action="{{route('creaPromozione')}}" method="POST" class="form">
        @csrf
        <div class="aggiungiOfferta"><button type="submit">+</button></div>
    </form>

@endsection
</html>
