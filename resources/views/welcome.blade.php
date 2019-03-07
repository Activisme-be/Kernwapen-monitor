@extends('layouts.frontend')

@section('content')
    <div class="jumbotron rounded-0">
        <h1><i class="ni ni-sound-wave text-danger mr-1"></i> {{ config('app.name') }} - Kernwapen monitor</h1>
        <p>Met dit platform willen we proberen om belgie de UN resolutie te laten tekenen dat kernwapens verband.</p>

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
            <div class="col-lg-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body py-4">
                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                            <i class="ni ni-notification-70"></i>
                        </div>
                        <h6 class="text-primary text-uppercase">Kernwapen petitie</h6>
                        <p class="description mt-3">
                            We hebben een petitie opgezet zodat jij ook je stem kunt laten horen. We verzamelen handtekeningen
                            om vervolgens met deze lijst naar de regering te stappen met de vraag voor een open en transparant debat.
                        </p>
                        <a href="#" class="btn shadow-sm btn-primary mt-2">Teken petitie</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body py-4">
                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                            <i class="fe fe-book-open"></i>
                        </div>
                        <h6 class="text-primary text-uppercase">Nieuws</h6>
                        <p class="description mt-3">
                            Ook willen wij u op de hoogte stellen omtrent al het nieuws dat als onderwerp kernwapens bezit.
                            Aangezien een goede basis van een actie de juiste informatie is. Kortom informatie is de sleutel tot alles.
                        </p>
                        <a href="#" class="btn shadow-sm btn-primary mt-2">Lees meer</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body py-4">
                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                            <i class="ni ni-calendar-grid-58"></i>
                        </div>
                        <h6 class="text-primary text-uppercase">Evenementen</h6>
                        <p class="description mt-3">
                            Wij organiseren ook evenementen waaraan u kunt deelnemen. Dit kan gaan van een Betoging, querillia actie.
                            Of simpel weg een informatieve avond of een panel gesprek tussen experten.
                        </p>
                        <a href="#" class="btn shadow-sm btn-primary mt-2">Bekijk kalender</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection