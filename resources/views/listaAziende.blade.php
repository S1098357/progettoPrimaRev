<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\listaAziende.css') }}">
@endsection
@section('content')

    <?php $info = \App\Models\Azienda::all(); ?>

    <ul>
        @for($i=0;$i<=sizeof($info)-1;$i++)
            <form action="{{route('Promozioni')}}" method="POST" class="form">
                @csrf
        <div class="lista-aziende">
            <li>
                <div class="nomeAzienda"> <input name="nomeAzienda" value="{{$info[$i]['nomeAzienda']}}"> </div>
                <img  {{$info[$i]['logo']}} height="200"width="200">
                <div class="testolista"> {{$info[$i]['descrizioneAzienda']}}</div>
                <div class="bottoni1"> <input type="submit" value="MODIFICA" formaction="{{route('modificaAziendaPost')}}"> </div>
                <div class="bottoni2"> <input type="submit" value="VISUALIZZA" formaction="{{route('visualizzaAziendaPost')}}"> </div>
            </li>
        </div>
        @endfor
    </ul>

    <form action="{{route('creaAzienda')}}" method="POST" class="form">
        @csrf
        <div class="aggiungiAzienda"><button type="submit">+</button></div>
    </form>

@endsection
</html>

