@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-person-fill me-2"></i> {{ $historicalPerson->name }}
        </h1>

        <a href="{{ route('historical-people.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna alla Lista
        </a>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <div class="row">

                {{-- LEFT COLUMN: IMAGE --}}
                <div class="col-md-4 d-flex justify-content-center mb-4 mb-md-0">

                    @if($historicalPerson->portrait)
                    <img src="{{ asset('storage/' . $historicalPerson->portrait) }}"
                        class="rounded-4 shadow-lg"
                        style="width: 100%; max-width: 280px; height: auto; object-fit: cover;">
                    @else
                    <div class="bg-secondary rounded-4 d-flex align-items-center justify-content-center shadow-lg"
                        style="width: 100%; max-width: 280px; height: 280px;">
                        <i class="bi bi-person-fill text-light" style="font-size: 5rem;"></i>
                    </div>
                    @endif

                </div>

                {{-- RIGHT COLUMN: DETAILS --}}
                <div class="col-md-8 text-light">

                    <h3 class="fw-bold mb-3">Biografia</h3>

                    <p class="opacity-75 fs-5">
                        {{ $historicalPerson->biography }}
                    </p>

                    <hr class="border-secondary my-4">

                    {{-- BIRTH YEAR --}}
                    <h3 class="fw-bold text-light mb-3">Anno di nascita</h3>
                    <p class="opacity-75 fs-5">{{ $historicalPerson->birth_year }}</p>


                    {{-- RELATED EVENTS --}}
                    <h4 class="fw-bold mb-3">
                        <i class="bi bi-calendar-event me-2"></i> Eventi Storici Collegati
                    </h4>

                    @if($historicalPerson->historicalEvents->count() > 0)

                    <ul class="list-group bg-dark">

                        @foreach($historicalPerson->historicalEvents as $event)
                        <li class="list-group-item bg-secondary text-light border-0 mb-2 rounded-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">{{ $event->title }}</span>

                                <a href="{{ route('events.show', $event->id) }}"
                                    class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-eye"></i> Apri
                                </a>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                    @else
                    <p class="opacity-50">Nessun evento collegato.</p>
                    @endif

                </div>

            </div>

        </div>
    </div>

</div>

@endsection