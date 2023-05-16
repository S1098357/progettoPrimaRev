<!DOCTYPE html>
<html>
@extends('layout.layout')

<link rel="stylesheet" type="text/css" href="{{URL('css\profile.css') }}">
@section('content')
    <title>Visualizza Profilo</title>
    <h1>Il Mio Profilo</h1>
    <p>Benvenuto nel tuo profilo personale!</p>
    <table>
        <tr>
            <th>Username:</th>
            <td>nomeutente</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>nomeutente@email.com</td>
        </tr>
        <tr>
            <th>Nome:</th>
            <td>Mario</td>
        </tr>
        <tr>
            <th>Cognome:</th>
            <td>Rossi</td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td>1234567890</td>
        </tr>
        <tr>
            <th>Data di nascita:</th>
            <td>01/01/1990</td>
        </tr>
        <tr>
            <th>Genere:</th>
            <td>Maschio</td>
        </tr>
        <tr>
            <th>Numero Coupon salvati:</th>
            <td>4</td>
        </tr>
    </table>
    <button onclick="visualizzaCoupon()">Visualizza Coupon Salvati</button>
@endsection
