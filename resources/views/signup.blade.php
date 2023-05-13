<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\signup.css') }}">
@endsection

@section('content')

    <section class="container">
        <div class="mt-5">
            @if($errors->any())
                <div>
                    <!-- Eventualmente da togliere dopo il secondo endif -->
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('Errore'))
                    <div class="alert alert-danger">{{session('Errore')}}</div>
                @endif
        </div>
        <header>Registrati</header>
        <form action="{{route('signupPost')}}" method="POST" class="form">
            @csrf
            <div class="input-box">
                <label>Username</label>
                <input type="text" placeholder="Inserisci lo Username" required name="username"/>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" placeholder="Inserisci la password" required name="password" />
                </div>
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" placeholder="Inserisci l'email" required name="email"/>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" placeholder="Inserisci il nome" required name="nome"/>
                </div>
                <div class="input-box">
                    <label>Cognome</label>
                    <input type="text" placeholder="Inserisci il cognome" required name="cognome" />
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Telefono</label>
                    <input type="number" minlength="10" maxlength="10" placeholder="Inserisci il numero di telefono" required name="telefono"/>
                </div>
                <div class="input-box">
                    <label>Data di Nascita</label>
                    <input type="date" placeholder="Inserisci la data di nascita" required name="datadinascita"/>
                </div>
            </div>
            <div class="gender-box">
                <h3>Genere</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="Uomo" name="genere" value="Uomo" checked/>
                        <label for="Uomo">Uomo</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="Donna" name="genere" value="Donna"/>
                        <label for="Donna">Donna</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="Other" name="genere" value="Non Definito" />
                        <label for="Other">Non Definito</label>
                    </div>
                </div>
            </div>


            </div>
            <button>Submit</button>
        </form>
    </section>
@endsection
</html>
