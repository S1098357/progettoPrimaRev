<!DOCTYPE html>
<html>
@extends('layout.layout')

<link rel="stylesheet" type="text/css" href="{{URL('css\profile.css') }}">
@section('content')

    @if($utente=Auth::user())

    <center><form>
        <h2>Modifica i tuoi dati personali</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">{{$utente['username']}}<br><br>
        <label for="username">Password:</label>
        <input type="text" id="password" name="password">{{$utente['password']}}<br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">{{$utente['email']}}<br><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">{{$utente['nome']}}<br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome">{{$utente['cognome']}}<br><br>
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono">{{$utente['telefono']}}<br><br>
        <label for="datadinascita">Data di nascita:</label>
        <input type="date" id="datadinascita" name="datadinascita">{{$utente['datadinascita']}}<br><br>
        <label for="genere">Genere:</label>
        <select id="genere" name="genere">
            <option value="maschio">Maschio</option>
            <option value="femmina">Femmina</option>
            <option value="altro">Altro</option>
        </select><br><br>
        <button type="submit">Salva Modifiche</button>
    </form></center>
@endif
@endsection
