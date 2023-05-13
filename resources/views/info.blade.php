<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\infoAziende.css') }}">
@endsection
@section('content')
    <ul>
        <!-- ogni elemento in lista-aziende sarà serializzato
            La funzione di interesse prenderà i dati da db, poi con un foreach produrrà tutti i risultati utili
         -->
        <div class="lista-aziende">
            <li>
                <img src="https://www.strunkmedia.com/wp-content/uploads/2018/05/bigstock-221516158.jpg" height="200"width="200">
                <div class="testolista"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <button onclick="location.href='azienda';">Visual Azienda</button>
            </li>
            <li>
                <img src="https://www.strunkmedia.com/wp-content/uploads/2018/05/bigstock-221516158.jpg" height="200"width="200">
                <div class="testolista"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <button onclick="location.href='azienda';">Visual Azienda</button>
            </li>
            <li>
                <img src="https://www.strunkmedia.com/wp-content/uploads/2018/05/bigstock-221516158.jpg" height="200"width="200">
                <div class="testolista"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <button onclick="location.href='azienda';">Visual Azienda</button>
            </li>
        </div>
    </ul>
@endsection
</html>
