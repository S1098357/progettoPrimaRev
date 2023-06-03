<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css/catalogo.css') }}">
@endsection

@section('content')

    <?php $info = \App\Models\Coupon::all(); ?>



    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <script src="{{asset('js/listaPromozioni.js')}}"></script>

    <script>

        $(function ricercaFiltribyNameAndWords() {
            $('#ricercaParola').on('keyup',function () {
                $value1 = $('#ricercaAzienda').val();
                $value2 = $('#ricercaParola').val();
                if ($value1 || $value2) {
                    $('#all-data').hide();
                    $('#searched-content').show();
                } else {
                    $('#all-data').show();
                    $('#searched-content').hide();
                }
                $.ajax({
                    type: 'GET',
                    url: '{{route('filtri3')}}',
                    data: {'ricercaParola': $value2, 'ricercaAzienda': $value1},
                    success: function (data) {
                        console.log(data);
                        $('#searched-content').html(data);
                    }
                })
            })
            $('#ricercaAzienda').on('keyup',function () {
                $value1 = $('#ricercaAzienda').val();
                $value2 = $('#ricercaParola').val();
                if ($value1 || $value2) {
                    $('#all-data').hide();
                    $('#searched-content').show();
                } else {
                    $('#all-data').show();
                    $('#searched-content').hide();
                }
                $.ajax({
                    type: 'GET',
                    url: '{{route('filtri3')}}',
                    data: {'ricercaParola': $value2, 'ricercaAzienda': $value1},
                    success: function (data) {
                        console.log(data);
                        $('#searched-content').html(data);
                    }
                })
            })
        })
    </script>


    <div class="horizontal">
        <button id=filter-button type="button">FILTRI</button>
        <div id="filtri" class="filtri">
            <p>Barra di ricerca per i filtri:</p>
            <label>Cerca nome azienda</label>
            <input type="text" name="ricercaAzienda" id="ricercaAzienda"/>
            <label>Cerca parola chiave</label>
            <input type="text" name="ricercaParola" id="ricercaParola"/>
            <button id=close-button type="button">X</button>
        </div>
    </div>
    <br><br><br><br><br>

    <div id="all-data">
        @foreach($listaPromozioni as $promozione)
            @csrf
            <div class="promozione">
                <div><p id="idCoupon"> Nome offerta: {{$promozione->idCoupon}} </p></div>
                <div><p id="oggetto"> Oggetto offerta: {{$promozione->oggetto}} </p></div>
                <div class="nomeCoupon"> <input name="idCoupon" value="{{$promozione->idCoupon}}"></div>
                <!-- Da mettere il middleware in modo che sogli gli utenti staff possano vederlo -->
                @if(Auth::check())
                    <div>
                        <div class="bottoni1"> <input type="submit" value="MODIFICA" onclick="location.href='{{route('modificaPromozione', ['idCoupon'=>$promozione->idCoupon])}}';"> </div>
                        <div class="bottoni2"> <input type="submit" value="VISUALIZZA" onclick="location.href='{{route('visualPromozione', ['idCoupon'=>$promozione->idCoupon])}}';"> </div>
                    </div>
                @endif
            </div>

        @endforeach
        <br><br>
    </div>


    <div id="searched-content" class="searched-content"></div>

    <!-- Da mettere il middleware in modo che sogli gli utenti staff possano vederlo -->
    @if(Auth::check())
        <div class="aggiungiOfferta"><button type="submit" onclick="location.href='{{route('promozioneCreator')}}';">+</button></div>
    @endif
    <br>
@endsection


</html>
