@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-person-badge me-2"></i> {{ $historical_person->name }}
        </h1>
        <p class="text-light opacity-75">
            Dettagli completi del personaggio storico selezionato.
        </p>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4 p-4">

        <div class="row g-4 align-items-start">

            {{-- IMMAGINE A SINISTRA --}}
            <div class="col-md-4">

                @if($historical_person->portrait)
                    <img src="{{ asset('storage/' . $historical_person->portrait) }}"
                         class="img-fluid rounded-4 shadow-lg"
                         style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    <div class="text-center py-4 text-light opacity-50 border rounded-4">
                        <i class="bi bi-image fs-1 d-block mb-2"></i>
                        Nessun ritratto disponibile
                    </div>
                @endif

            </div>

            {{-- TESTO A DESTRA --}}
            <div class="col-md-8">

                {{-- BIOGRAFIA --}}
                <h3 class="text-light mb-3">Biografia</h3>
                <p class="text-light opacity-75 fs-5">
                    {{ $historical_person->biography }}
                </p>

                {{-- EVENTI COLLEGATI --}}
                <h4 class="text-light mt-4 mb-3">Eventi Collegati</h4>

                @if($historical_person->historicalEvents->count() > 0)
                    @foreach ($historical_person->historicalEvents as $event)
                        <a href="{{ route('events.show', $event->id) }}"
                           class="badge bg-primary fs-6 me-1 mb-2 text-decoration-none">
                            {{ $event->title }}
                        </a>
                    @endforeach
                @else
                    <p class="text-light opacity-50">Nessun evento collegato.</p>
                @endif

                {{-- BOTTONI --}}
                <div class="d-flex justify-content-between mt-5">

                    <a href="{{ route('historical-people.index') }}" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left me-1"></i> Torna ai Personaggi
                    </a>

                    <div>
                        <a href="{{ route('historical-people.edit', $historical_person->id) }}"
                           class="btn btn-warning me-2">
                            <i class="bi bi-pencil me-1"></i> Modifica
                        </a>

                        <form action="{{ route('historical-people.destroy', $historical_person->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger"
                                    onclick="return confirm('Vuoi eliminare questo personaggio?')">
                                <i class="bi bi-trash me-1"></i> Elimina
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
