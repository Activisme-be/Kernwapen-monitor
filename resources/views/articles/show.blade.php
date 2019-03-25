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
        <div class="col-8"> {{-- Content --}}
            <div class="card card-body shadow-sm border-0">
                <h5 class="border-bottom border-gray pb-1 mb-2">{{ ucfirst($article->titel) }}</h5>

                <small class="align-middle mb-3 text-secondary">
                    Geplaatst op {{ $article->created_at->format('d/m/Y') }} door {{ $article->author->name }}
                </small>

                {!! str_replace('<p>', '<p class="card-text">', $article->content) !!}
            </div>
        </div> {{-- /// END content --}}
    </div>
@endsection