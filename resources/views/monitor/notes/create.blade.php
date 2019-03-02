@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Steden monitor</h1>
            <div class="page-subtitle">Notitie toevoegen voor de stad {{ $city->naam }}</div> 

            <div class="page-options d-flex">
                <a href="{{ route('monitor.notes', $city) }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-1"></i> Notitie overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidenav --}}
                @include ('monitor.components.backend-sidenav', ['city' => $city])
            </div> {{-- /// END sidenav --}}

            <div class="col-9"> {{-- Content --}}
                <form method="POST" action="{{ route('monitor.notes.store', $city) }}" class="card card-body">
                    @csrf {{-- Form field protection --}}
                    <h6 class="border-bottom border-gray pb-1 mb-3">Notitie toevoegen voor de stad <strong>{{ $city->naam }}</strong></h6>
                
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="inputTitel">Titel van de notitie <span class="text-danger">*</span></label>
                            <input type="text" id="inputTitel" class="form-control @error('titel', 'is-invalid')" @input('titel') placeholder="Titel van de notitie">
                            @error('titel')
                        </div>

                        <div class="form-group col-12">
                            <label for="inputBeschrijving">Extra informatie omtrent de notitie <span class="text-danger">*</span></label>
                            <textarea rows="6" placeholder="Extra informatie omtrent de notitie" id="inputBeschrijving" class="form-control @error('beschrijving', 'is-invalid')" @input('beschrijving')>{{ old('beschrijving') }}</textarea>
                            @error('beschrijving')
                        </div>
                    </div> 
                    
                    <hr class="mt-0">

                    <div class="form-row">
                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-success">Opslaan</button>
                            <button type="reset" class="btn btn-light">Reset</button>
                        </div>
                    </div>
                </form>
            </div> {{-- /// End content --}}
        </div>
    </div>
@endsection