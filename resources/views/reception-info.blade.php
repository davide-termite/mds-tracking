@extends('layouts.app')

@section('content')
<div class="container my-5">
    <a href="/reception">Torna indietro</a>
    <div class="row my-5">
        <div class="col-6">
            <p> Codice: {{$tracker->codice}}</p>
            <p> Proprietario Spedizione: {{$user->nome}}</p>
            <p> Descrizione Spedizione: {{$tracker->descrizione}}</p>
            <p> Stato Spedizione: {{$stato}}</p>
            <p> Contatta Proprietario: {{$user->email}}</p>
        </div>
        <div class="col-6">
            <p>Controlla lo stato della spedizione e i dati il proprietario. </p>
            <p>Quando la spedizione sarà registrata come "Consegnata" dal corriere, potrai inviare una mail al proprietario del pacco tramite il tasto "Invia Mail"</p>
        </div>
    </div>
    <div class="row">
        <form action="{{ url('/reception/'. $tracker->codice .'/'. $user->id .'/sendmail') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="number" value="1" hidden>
            <button {{ $stato !== "consegnata" ? "disabled" : "active" }} class="btn btn-lg btn-secondary {{ $stato !== "consegnata" ? "disabled" : "active" }}" type="submit" >Invia Mail</button>
        </form>
    </div>
</div>

@endsection