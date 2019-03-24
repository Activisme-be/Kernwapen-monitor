@extends('layouts.frontend')

@section('content')
    <div class="jumbotron rounded-0">
        <h1><i class="fe fe-activity text-danger mr-1"></i> Kernwapen monitor - Nieuws</h1>
        <p>Blijf op de hoogte omtrent de laatrste vorderingen met betrekking tot kernwapens.</p>

        <hr class="my-3">

        <a href="" class="btn btn-facebook">
            <i class="fe fe-facebook mr-1"></i> Facebook
        </a>

        <a href="" class="btn btn-twitter">
            <i class="fe fe-twitter mr-1"></i> Twitter
        </a>
    </div>

    <div class="container-fluid pb-3">
        <div class="row row-grid">
            <div class="col-8"> {{-- Content --}}
                @foreach ($articles as $article) {{-- Article loop --}}
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body pb-1 mb-2">
                            <h5 class="card-title mb-1 brand-title">{{ ucfirst($article->titel) }}</h5>

                            <p class="card-text mb-0 pt-1">
                                {!! \Illuminate\Support\Str::words(strip_tags($article->content), 40) !!}
                            </p>

                            <hr style="margin-top: 7px;" class="mb-1">

                            <small class="align-middle text-secondary">
                                Gepubliceerd op {{ $article->created_at->format('d/m/Y') }} door 

                                @if (! $article->hasNoAuthor()) 
                                    {{ $article->author->name }}
                                @else
                                    {{ config('app.name') }}
                                @endif   
                            </small>

                            <small class="text-muted float-right card-link">
                                <a href="{{ route('article.show', $article) }}" class="align-middle card-link">Lees meer »</a>
                            </small>
                        </div>
                    </div>
                @endforeach {{-- /// End article loop --}}

                {{ $articles->links('articles.components.frontend-pagination') }} {{-- Pagination view instance --}}

            </div> {{-- /// END Content --}}

            <div class="col-4">
                <div class="bg-light card border-0 shadow-sm">
                    <div class="card-header">
                        Populaire categorieen
                    </div>
                    <div class="card-body rounded-bottom bg-white">
                        @if (count($categories) > 0)
                           @foreach($categories as $tag) 
                                <a href="" class="btn btn-sm btn-outline-primary">
                                    <i class="fe fe-tag mr-1"></i> {{ ucfirst($tag->name) }}
                                </a>   
                            @endforeach
                        @else 
                            <small class="card-text text-secondary">Momenteel zijn er geen nieuws categorieen</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection