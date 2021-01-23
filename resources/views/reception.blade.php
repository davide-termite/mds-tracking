@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Reception Dashboard</h1>

            <div class="col-8 offset-2 p-3 ">
                @if(session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>                    
                @endif

                @if(session('error'))
    
                <div class="alert alert-danger">
                  {{session('error')}}
                </div>
                    
                @endif

                @if (count($trackers) !== 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Codice Spedizione</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Stato</th>
                        <th scope="col">Dettagli</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($trackers as $tracker)
                      <tr>
                        <td>{{$tracker->codice}}</td>
                        <td>{{$tracker->descrizione}}</td>
                        <td>{{$tracker->stato}}</td>
                        <td><a href="/reception/{{$tracker->codice}} ">Visualizza Stato</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                    <div class="row d-flex justify-content-around">
                        <h5>Non ci sono spedizioni registrate</h5>
                    </div>
                @endif
    
            </div>
    </div>
@endsection