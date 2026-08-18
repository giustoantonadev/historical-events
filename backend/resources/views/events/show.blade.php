@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-flag me-2"></i> {{ $historicalEvent->title }}
        </h1>
        <p class="text-light opacity-75">
            Dettagli completi dell'evento storico selezionato.
        </p>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- IMMAGINE EVENTO --}}
        @if($historicalEvent->image)
            <img src="{{ asset('storage/' . $historicalEvent->image) }}"
                 class="w-100"
                 style="max-height: 350px; object-fit: cover;">
        @endif

        <div class="card-body p-4">

            {{-- PERIODO --}}
            <div class="mb-3">
                <h5 class="text-light mb-1">Periodo Storico</h5>
                <span class="badge bg-primary fs-6">
                    {{ $historicalEvent->period->name }}
                </span>
            </div>

            {{-- ANNO --}}
            <div class="mb-3">
                <h5 class="text-light mb-1">Anno</h5>
                <p class="text-light opacity-75 fs-5">{{ $historicalEvent->year }}</p>
            </div>

            {{-- DESCRIZIONE --}}
            <div class="mb-4">
                <h5 class="text-light mb-1">Descrizione</h5>
                <p class="text-light opacity-75 fs-5">{{ $historicalEvent->description }}</p>
            </div>

            {{-- PERSONAGGI COLLEGATI --}}
            <div class="mb-4">
                <h5 class="text-light mb-2">Personaggi Coinvolti</h5>

                @if($historicalEvent->historicalPeople->count() > 0)
                    @foreach ($historicalEvent->historicalPeople as $person)
                        <span class="badge bg-info text-dark fs-6 me-1 mb-2">
                            {{ $person->name }}
                        </span>
                    @endforeach
                @else
                    <p class="text-light opacity-50">Nessun personaggio collegato.</p>
                @endif
            </div>

            {{-- BOTTONI --}}
            <div class="d-flex justify-content-between mt-4">

                <a href="{{ route('events.index') }}" class="btn btn-outline-light">
                    <i class="bi bi-arrow-left me-1"></i> Torna agli Eventi
                </a>

                <div>
                    <a href="{{ route('events.edit', $historicalEvent->id) }}"
                       class="btn btn-warning me-2">
                        <i class="bi bi-pencil me-1"></i> Modifica
                    </a>

                    <form action="{{ route('events.destroy', $historicalEvent->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"
                                onclick="return confirm('Vuoi eliminare questo evento?')">
                            <i class="bi bi-trash me-1"></i> Elimina
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
