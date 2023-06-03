<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\aziendaEditor.css') }}">
@endsection

@section('content')
    <center>
        <form>


                @if($option == 'edit')
                    <h2>Modifica Azienda</h2>

                    <h2>Modifica i dati dell'azienda</h2>

                    <p>{{$azienda}}</p>
                    <p>{{$option}}</p>

                <label for="nomeAzienda">Nome Azienda:</label>
                <input type="text" name="nomeAzienda" id="nomeAzienda" value="{{$azienda->nomeAzienda}}">
                <label for="ragioneSociale">Ragione Sociale:</label>
                <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{$azienda->ragioneSociale}}"><br><br>
                <label for="localizzazione">Localizzazione:</label>
                <input type="text" id="localizzazione" name="localizzazione" value="{{$azienda->localizzazione}}"><br><br>
                <label for="tipologia">Tipologia Azienda:</label>
                <input type="text" id="tipologia" name="tipologia" value="{{$azienda->tipologia}}"><br><br>
                <label for="logo">Logo:</label>
                <input type="text" id="logo" name="logo" value="{{$azienda->logo}}"><br><br>
                <label for="descrizioneAzienda">Descrizione Azienda:</label>
                <textarea id="descrizioneAzienda" name="descrizioneAzienda">{{$azienda->descrizioneAzienda}}</textarea><br><br>

                <input type="submit" value="Salva Modifiche" formaction="{{route('editAzienda', ['id'=>$azienda->id])}}">
                <input type="submit" value="ELIMINA" formaction="{{route('eliminaAzienda',['id'=>$azienda->id])}}">

            @elseif($option == 'create')
                <label for="nomeAzienda">Nome Azienda: </label>
                <input type="text" id="nomeAzienda" name="nomeAzienda"><br><br>
                <label for="ragioneSociale">Ragione Sociale:</label>
                <input type="text" id="ragioneSociale" name="ragioneSociale"><br><br>
                <label for="localizzazione">localizzazione:</label>
                <input type="text" id="localizzazione" name="localizzazione"><br><br>
                <label for="logo">Logo:</label>
                <input type="text" id="logo" name="logo"><br><br>
                <label for="tipologia">Tipologia di azienda:</label>
                <input type="text" id="tipologia" name="tipologia"><br><br>
                <label for="descrizioneAzienda">Descrizione dell'azienda:</label>
                <textarea id="descrizioneAzienda" name="descrizioneAzienda"></textarea><br><br>
                <input type="submit" value="Crea Azienda" formaction="{{route('aziendaCreate')}}">
            @endif
        </form>


    </center>
@endsection
