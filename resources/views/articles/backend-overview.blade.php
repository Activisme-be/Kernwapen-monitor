@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Nieuwsberichten</h1>
            <div class="page-subtitle">beheerspaneel</div>

            <div class="page-options d-flex">
                <a href="{{ route('articles.create') }}" class="btn btn-secondary mr-2">
                    <i class="fe fe-plus"></i>
                </a>

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe mr-1 fe-filter"></i> Filter
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Alle berichten</a>
                        <a class="dropdown-item" href="">Gepubliceerde berichten</a>
                        <a class="dropdown-item" href="">Klad berichten</a>
                    </div>
                </div>

                <form method="GET" action="{{ route('users.search') }}" class="w-100">
                    <input type="text" class="form-control" @input('term') placeholder="Zoeken">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-3"> {{-- Sidebar --}}
                @include ('articles.components.sidebar')
            </div> {{-- /// END sidebar --}}

            <div class="col-9"> {{-- content --}}
                <div class="card card-body">
                    <h6 class="border-bottom border-gray pb-1 mb-3">Overzicht nieuwsberichten</h6>
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <div class="table-responsive">
                        <table class="table table-hover table-sm mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">Auteur</th>
                                    <th scope="col" class="border-top-0">Status</th>
                                    <th scope="col" class="border-top-0">Titel</th>
                                    <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column only for the functions --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article) {{-- Article loop --}}
                                    <tr>
                                        <td>
                                            @if ($article->hasNoAuthor())
                                                Onbekende gebruiker 
                                            @else 
                                                {{ $article->author->name }}
                                            @endif
                                        </td>
                                        
                                        <td> {{-- Status field --}}
                                            @if ($article->isPublished())
                                                <span class="badge badge-success">Gepubliceerd</span>
                                            @else {{-- The article has a draft status --}}
                                                <span class="badge badge-danger">Klad versie</span>
                                            @endif
                                        </td> {{-- /// End status field --}}

                                        <td>{{ ucfirst($article->titel) }}</td>

                                        <td> {{-- Function column --}} 
                                            <span class="float-right">
                                                <a href="" class="text-secondary mr-2 text-decoration-none">
                                                    <i class="fe fe-eye"></i>
                                                </a>

                                                <a href="" class="text-secondary mr-1 text-decoration-none">
                                                    <i class="fe fe-edit"></i>
                                                </a>

                                                @if ($article->isPublished()) 
                                                    <a href="{{ route('article.draft', $article) }}" class="text-info text-decoration-none">
                                                        <i class="fe fe-rotate-ccw"></i>
                                                    </a>
                                                @elseif ($article->isDraft())
                                                    <a href="{{ route('article.publish', $article) }}" class="text-success text-decoration-none">
                                                        <i class="fe fe-check"></i>
                                                    </a>
                                                @endif

                                                <a href="" class="text-danger ml-2 text-decoration-none">
                                                    <i class="fe fe-trash-2"></i>
                                                </a>
                                            </span>
                                        </td> {{-- /// End function column  --}}
                                    </tr>
                                @empty {{-- There are no articles found --}}
                                    <tr>
                                        <td colspan="4">
                                            <span class="text-secondary">Er zijn momenteel geen nieuwsberichten gevonden</span>
                                        </td>
                                    </tr>
                                @endforelse {{-- // End article loop --}}
                            </tbody>
                        </table>

                        {{ $articles->links() }} {{-- Pagination view instance --}}
                    </div>
                </div>
            </div> {{-- /// END content --}}
        </div>
    </div>
@endsection