<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\modificaPromozione.css') }}">
@endsection

@section('content')

    @if(session()->has('promozione'))

        <center><form method="POST" class="form">
                @csrf
                    <h2>Modifica i dati della promozione {{session('promozione')['idCoupon']}}</h2>
                    <div class="nomeCoupon"> <input name="idCoupon" value="{{session('promozione')['idCoupon']}}"></div>
                    <label for="oggetto">Oggetto:</label>
                    <input type="text" id="oggetto" name="oggetto" value="{{session('promozione')['oggetto']}}"><br><br>
                    <label for="modalità">Modalità:</label>
                    <input type="text" id="modalità" name="modalità" value="{{session('promozione')['modalità']}}"><br><br>
                    <label for="scontistica">Scontistica:</label>
                    <input type="text" id="scontistica" name="scontistica" value="{{session('promozione')['scontistica']}}"><br><br>
                    <label for="luogoFruizione">Luogo fruizione:</label>
                    <input type="text" id="luogoFruizione" name="luogoFruizione" value="{{session('promozione')['luogoFruizione']}}"><br><br>
                    <?php $info = \App\Models\Azienda::all(); ?>
                    @for($i=0;$i<=sizeof($info)-1;$i++)
                    <select id="Azienda" name="Azienda">
                        <option value="{{$info[$i]['nomeAzienda']}}">{{$info[$i]['nomeAzienda']}}</option>
                        @endfor
                    </select><br><br>
                    <input type="submit" value="Salva Modifiche" formaction="{{route('modificaPromozioneFinale')}}">
                    <input type="submit" value="ELIMINA" formaction="{{route('eliminaPromozione')}}">
            </form></center>
    @endif

@endsection
</html>
