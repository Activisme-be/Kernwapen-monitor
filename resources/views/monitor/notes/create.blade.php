@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Steden monitor</h1>
            <div class="page-subtitle">Notitie toevoegen voor de stad {{ $city->naam }}</div> 
        </div>
    </div>
@endsection