@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Steden monitor</h1>
            <div class="page-subtitle">Stadsinformatie weergave</div>

            <div class="page-options d-flex">
                <a href="{{ route('monitor.dashboard') }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-1"></i> Stads overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidenav --}}
                @include ('monitor.components.backend-sidenav', ['city' => $city])
            </div> {{-- /// End sidenav --}}

            <div class="col-9"> {{-- Content field --}}
                <form method="POST" action="{{ route('monitor.show.update', $city) }}" class="card card-body">
                    @csrf               {{-- Form field protection --}}
                    @method('PATCH')    {{-- HTTP method spoofing --}}
                    @form($city)        {{-- Bind the city data to the form --}}

                    <h6 class="border-bottom border-gray pb-2 mb-3">Stadsinformatie omtrent <strong>{{ ucfirst($city->naam) }}</strong></h6>
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputName">Stadsnaam <span class="text-danger">*</span></label>
                            <input id="inputName" type="text" @input('naam') class="form-control @error('naam', 'is-invalid')" placeholder="Naam van de stad">
                            @error('naam')
                        </div>

                        <div class="form-group col-md-5">
                            <label for="inputProvince" for="inputProvince">Provincie <span class="text-danger">*</span></label>

                            <select id="inputProvince" class="form-control @error('province', 'is-invalid')" @input('province')>
                                @foreach ($provinces as $province) {{-- Loop through the province --}}
                                    <option value="{{ $province->id }}" @if ($city->province_id === $province->id) selected @endif> 
                                        {{ ucfirst($province->naam) }} 
                                    </option>
                                @endforeach {{-- /// END province loop --}}
                            </select>

                            @error('province') {{-- Validation error view partial --}}   
                        </div>

                        <div class="form-group col-md-3">
                            <label for="postalCode">Postcode</label>
                            <input id="postalCode" type="text" class="form-control" disabled value="{{ $city->postal->code }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="inputLat">Breedtegraad <span class="text-danger">*</span></label>

                            <input id="inputLat" class="form-control @error('lat', 'is-invalid')" @input('lat') placeholder="Breedtegraad van de stad">
                            @error('lat')
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="inputLng">Lengtegraad <span class="text-danger">*</span></label>

                            <input id="inputLng" class="form-control @error('lng', 'is-invalid')" @input('lng') placeholder="Lengtegraad van de stad">
                            @error('lng')
                        </div>
                    </div>

                    <hr class="mt-0 border-grey">

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success rounded">Aanpassen</button>
                        <button type="reset" class="btn btn-light rounded">Reset</button>
                    </div>
                </form>
            </div> {{-- /// Content field --}}
        </div>
    </div>
@endsection