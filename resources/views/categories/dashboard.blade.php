@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Nieuws categorieen</h1>
            <div class="page-subtitle">Overzicht</div>

            <div class="page-options d-flex">
                <a class="btn btn-secondary mr-2" href="{{ route('categories.create') }}">
                    <i class="fe fe-plus"></i>
                </a>

                <form action="" method="GET" class="w-100">
                    <input type="text" class="form-control" @input('term') placeholder="zoeken">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidebar --}}
                @include('articles.components.sidebar')
            </div> {{-- /// END sidebar --}}

            <div class="col-9"> {{-- Content --}}
                <div class="card card-body">
                    @include('flash::message') {{-- Flash session view partial --}}

                    <div class="table-responsive">
                        <table class="table table-hover table-sm mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">Aangemaakt door</th>
                                    <th scope="col" class="border-top-0">Naam</th>
                                    <th scope="col" class="border-top-0">Aangemaakt op</th>
                                    <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column for the functions only --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category) {{-- Loop through the categories in the application --}}
                                @empty {{-- There are no categories found in the application --}}
                                    <tr>
                                        <td colspan="4">
                                            <span class="text-secondary">Er zijn geen momenteel geen nieuws categorieen in de applicatie.</span>
                                        </td>
                                    </tr>
                                @endforelse {{-- End category loop --}}
                            </tbody>
                        </table>
                    </div>

                    {{ $categories->links() }} {{-- Pagination view partial --}}
                </div>
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection