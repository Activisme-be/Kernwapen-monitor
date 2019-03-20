@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Steden monitor</h1>
            <div class="page-subtitle">Notitie overzicht</div>

            <div class="page-options d-flex">
                <a href="{{ route('monitor.notes.create', $city) }}" class="btn btn-secondary mr-2">
                    <i class="fe fe-plus"></i>
                </a>

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('monitor.notes', $city) }}">Alle notities</a>
                        <a class="dropdown-item" href="{{ route('monitor.notes', ['city' => $city, 'filter' => 'gebruiker']) }}">Mijn notities</a>
                    </div>
                </div>

                <form method="GET" action="{{ route('monitor.notes.search', $city) }}" class="w-100 ml-2">
                    <input type="text" class="form-control" @input('term') placeholder="Zoek notitie">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Side navigation --}}
                @include('monitor.components.backend-sidenav', ['city' => $city])
            </div> {{-- /// END side navigation --}}

            <div class="col-9"> {{-- Content --}}
                <div class="card card-body">
                    <h6 class="border-bottom border-gray pb-2 mb-3">Notities omtrent de stad <strong>{{ ucfirst($city->naam) }}</strong></h6>
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">Auteur</th>
                                    <th scope="col" class="border-top-0">Notitie</th>
                                    <th scope="col" class="border-top-0">Datum</th>
                                    <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column that are needed for the options --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notes as $note) {{-- Loop trough the notes --}}
                                    <tr>
                                        <td>{{ $note->author->name }}</td>
                                        <td>{{ ucfirst($note->titel) }}</td>
                                        <td>{{ $note->created_at->diffForHumans() }}</td>

                                        <td> {{-- Option column --}}
                                            <span class="float-right">
                                                <a class="text-decoration-none text-secondary mr-1" href="{{ route('note.show', $note) }}">
                                                    <i class="fe fe-eye"></i>
                                                </a>

                                                <a class="text-decoration-none @if ($currentUser->cannot('update', $note)) disabled @endif text-secondary mr-1">
                                                    <i class="fe fe-edit-2"></i>
                                                </a>

                                                <a class="text-decoration-none @if ($currentUser->cannot('delete', $note)) disabled @endif text-danger mr-1" href="{{ route('monitor.notes.delete', $note) }}">
                                                    <i class="fe fe-x-circle"></i>
                                                </a>
                                            </span>
                                        </td> {{-- /// Option column --}}
                                    </tr>
                                @empty {{-- There are no notes for the city in the application --}}
                                    <tr>
                                        <td colspan="6">
                                            <span class="text-secondary">Er zijn momenteel geen notities voor {{ $city->naam }} gevonden.</span>
                                        </td>
                                    </tr>
                                @endforelse {{-- /// END loop --}} 
                            </tbody>
                        </table>
                    </div>

                    {{ $notes->links() }} {{-- Pagination view instance --}}
                </div>
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection