@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <a href="/dashboard">Torna indietro</a>
        </div>
        <div class="row my-3">
            <h5> Informazioni Codice: {{$tracker->codice}}</h5>
        </div>
        <div class="row my-3">
            <h5> Descrizione Spedizione: {{$tracker->descrizione}}</h5>
        </div>
    </div>

    <div class="container">
        <h3>Stato</h3>
        <p id="stato-output"></p>
        <h3>Ultimo Aggiornamento</h3>
        <p id="desc-output"></p>
    </div>

    <script>
        $(document).ready(function(){
            const urlBase = "https://ws001.selfivery.com/api/test/spedizione";
            const codice = $(location).attr("pathname").split("/").pop();

            $.ajax({
                url: urlBase + '/' + codice,
                method: "GET",
                dataType: 'json',

                success: function(data){
                    // console.log(data);
                    populateHtml(data)
                },

                error: function(errore){
                    alert("C'è stato un errore " + errore);
                },
            });
        });


        function populateHtml(response){
            const statoOutput = $("#stato-output");
            const dataOutput = $("#desc-output");
            statoOutput.html(response.stato)
            dataOutput.html(response.data_aggiornamento)
        }
    </script>
@endsection