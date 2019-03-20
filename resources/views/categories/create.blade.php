@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Nieuws categorieen</h1>
            <div class="page-subtitle">Nieuwe categorie</div>

            <div class="page-options d-flex">
                <a href="{{ route('categories.dashboard') }}" class="btn btn-secondary">
                    <i class="fe fe-tag mr-1"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidebar --}}
                @include('articles.components.sidebar')
            </div> {{-- /// END sidebar --}}

            <div class="col-9">
                <form action="{{ route('categories.store') }}" method="POST" class="card card-body">
                    <h6 class="border-bottom border-gray pb-1 mb-3">Nieuws categorie toevoegen</h6>

                    @csrf {{-- Form field protection --}}
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputNaam">Naam <span class="text-danger">*</span></label>
                            <input class="form-control @error('naam', 'is-invalid')" type="text" id="inputNaam" placeholder="Naam van de categorie" @input('naam')>
                            @error('naam')
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
            </div>
        </div>
    </div>
@endsection