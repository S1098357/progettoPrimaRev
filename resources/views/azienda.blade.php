<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\azienda.css') }}">
@endsection

@section('content')
    <div class="titolo_azienda">
        <h1>Nome azienda</h1>
    </div>
    <br>
    <div class="immagine_azienda">
        <center>
            <img src="https://www.strunkmedia.com/wp-content/uploads/2018/05/bigstock-221516158.jpg" height="400px"width="400px">
            <br>
        </center>
    </div>
    <div class="carattesristiche_azienda">
        <center>
            <i>
                <li>Localizzazione,Tipologia azienda,Ragione sociale</li>
            </i>
        </center>
    </div>
    <br>
    <section>
        <div class="descrizione_azienda">
            Descrizione azienda: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget enim quis tellus ornare egestas. Nam vitae sapien enim. Proin commodo condimentum magna eu eleifend. Fusce mattis placerat ex, eget vehicula sem euismod ut. Phasellus eget rutrum sapien. Quisque interdum tortor eget est mollis faucibus. Ut eu semper risus. Vestibulum quis gravida libero. Fusce eu eros in lectus cursus auctor quis eget lorem.
        </div>
    </section>




@endsection
</html>
