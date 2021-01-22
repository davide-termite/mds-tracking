@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-3 d-flex justify-content-center">
            <h2>Bentornato, {{ Auth::user()->nome }}.</h2>
        </div>

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

        <div class="row">
            <div class="col-6">
                <h2 class="border-bottom p-3">Le tue spedizioni</h2>
                <div class="card-body mt-3">
                    @if (count($tracker) !== 0)
                    @foreach ($tracker as $track)
                        <div class="row d-flex justify-content-between">
                            <h5>{{$track->codice}} </h5>
                            <p>{{$track->descrizione}} </p>
                            <a href="/dashboard/{{$track->codice}} ">Mostra info</a>
                        </div>
                    @endforeach
                    @else
                    <div class="row d-flex justify-content-around">
                        <h5>Non ci sono spedizioni registrate</h5>
                    </div>
                    @endif
                </div>
            </div>
            <div class="border-left col-6">
                <h2 class="border-bottom p-3">Inserisci Spedizione</h2>
                <div class="card-body mt-3">
                    <form method="POST" action="{{ route('dashboard-create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="codice" class="col-md-4 col-form-label text-md-right">{{ __('Codice Tracking') }}</label>

                            <div class="col-md-6">
                                <input id="codice" type="text" placeholder="Inserisci un codice tracking" class="form-control @error('codice') is-already-registered @enderror" name="codice" value="{{ old('codice') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descrizione" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <textarea id="descrizione" type="text" placeholder="Inserisci una descrizione" class="form-control" name="descrizione" rows="10" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aggiungi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
@endsection