@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Steden monitor</h1>
            <div class="page-subtitle">Informatie overzicht</div>

            <div class="page-options d-flex">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('monitor.dashboard') }}">Alle steden</a>
                    </div>
                </div>

                <form method="GET" action="" class="w-100 ml-2">
                    <input type="text" class="form-control" @input('term') placeholder="Zoeken">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-9"> {{-- Content --}}
                <div class="card card-body">
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">#</th>
                                    <th scope="col" class="border-top-0">Provincie</th>
                                    <th scope="col" class="border-top-0">Stad</th>
                                    <th scope="col" class="border-top-0">Handtekeneningen</th>
                                    <th scope="col" class="border-top-0">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cities as $city) {{-- Loop trough the cities --}}
                                    <tr>
                                        <td><strong>#{{ $city->id }}</strong></td>
                                        <td>{{ $city->province->naam }}</td>
                                        <td>{{ $city->postal->code }} - {{ $city->naam }}</td>
                                        <td>{{ $city->postal->signatures()->count() }} Handtekeningen</td>
                                        
                                        <td> {{-- Options  --}}
                                            <span class="float-right">
                                                <a href="{{ route('monitor.show', $city) }}" class="font-weight-bold text-decoration-none text-secondary mr-1">
                                                    <i class="fe fe-eye"></i>
                                                </a>
                                            </span> 
                                        </td> {{-- /// END options --}}
                                    </tr>
                                @empty {{-- There are no cities found in the application --}}
                                @endforelse {{-- /// END city loop --}}
                            </tbody>
                        </table>
                    </div>

                    {{ $cities->links() }} {{-- Pagination view instance --}}
                </div> {{-- /// END content --}}
            </div>

            <div class="col-3"> {{-- Stats widget --}}

                <div class="card tw-shadow mb-4 p-2">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md shadow-sm bg-success mr-3">
                            <i class="fe fe-home"></i>
                        </span>

                        <div>
                            <h5 class="m-0">{{$cityCount }} <small>Steden</small></h5>
                            <small class="text-muted">Doen mee aan de petitie</small>
                        </div>
                    </div>

                    <hr class="mt-2 mb-2">

                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md shadow-sm bg-secondary mr-3">
                            <i class="fe fe-edit"></i>
                        </span>

                        <div>
                            <h5 class="m-0">0 <small>Handtekeningen</small></h5>
                            <small class="text-muted">Verzameld in de petitie voor de steden.</small>
                        </div>
                    </div>
                </div>

            </div> {{-- /// Stats widget --}}
        </div>
    </div>
@endsection