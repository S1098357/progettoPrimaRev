<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\listaStaff.css') }}">
@endsection

@section('content')

    <?php $infoUtenti = \App\Models\User::all(); ?>

    <div class="titolo">Gestisci i membri dello staff: </div>

    @for($i=0;$i<=sizeof($infoUtenti)-1;$i++)
        <div class="utente" >
            <div><p id="username"> Nome utente: {{$infoUtenti[$i]['username']}} </p></div>
            <div><p id="email"> Email: {{$infoUtenti[$i]['email']}} </p></div>
            <div>
                <div class="bottoni1"> <button onclick="location.href='{{route('modificaStaff', ['id'=>$infoUtenti[$i]['id']])}}';">Modifica</button> </div>
                <div class="bottoni2"> <button onclick="location.href='{{route('eliminaStaff', ['id'=>$infoUtenti[$i]['id']])}}';">Elimina</button> </div>
            </div>
        </div>
    @endfor

    <div class="aggiungiStaff"><button onclick="location.href='{{route('staffCreator')}}';">+</button></div>

@endsection
</html>
