@extends ('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Steden monitor</h1>
            <div class="page-subtitle">Weergave notitie voor de postcode {{ $note->postal->code }}</div> 

            <div class="page-options d-flex">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group">
                        <a href="{{ route('monitor.dashboard') }}" class="btn btn-outline-secondary">
                            <i class="fe fe-list mr-1"></i> Stads overzicht
                        </a>

                         <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                            <i class="fe fe-chevrons-left mr-1"></i> Ga terug
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card">
            <div class="card-body">
                <h6 class="border-bottom border-gray pb-2 mb-2">[Notitie]: {{ ucfirst($note->titel) }}</h6>
                <small class="text-secondary">Notitie toegevoegd door {{ $note->author->name }} op {{ $note->created_at->format('d/m/Y')}}</small>
        
                <p class="card-text mt-2">{{ ucfirst($note->beschrijving) }}</p>

                @if ($currentUser->can('delete', $note) || $currentUser->can('update', $note))
                    <hr class="mt-0">

                    @if ($currentUser->can('delete', $note))
                        <a href="{{ route('monitor.notes.delete', $note) }}" class="card-link text-decoration-none text-danger">
                            <i class="fe fe-x-circle mr-1"></i> Verwijder notitie
                        </a>
                    @endif

                     @if ($currentUser->can('update', $note))
                        <a href="#" class="card-link text-decoration-none text-secondary">
                            <i class="fe fe-edit-2 mr-1"></i> Wijzig notitie
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection