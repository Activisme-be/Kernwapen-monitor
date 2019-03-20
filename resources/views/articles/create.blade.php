@extends ('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Nieuwsberichten</h1>
            <div class="page-subtitle">Artikel toevoegen</div>

            <div class="page-options d-flex">
                <a class="btn btn-secondary" href="{{ route('categories.create') }}">
                    <i class="fe fe-book-open mr-2"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidebar --}}
                @include ('articles.components.sidebar')
            </div> {{-- /// END sidebar --}}

            <div class="col-9"> {{-- content --}}
                <form class="card card-body" method="POST" action>
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="contentArea">Bericht <span class="text-danger">*</span></label>
                            <textarea id="contentArea" @input('content') class="form-control @error('content', 'is-invalid') col-md-12">{{ old('content') }}</textarea>
                            @error('content')
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
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection