@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-plus-circle me-2"></i> Crea Nuovo Evento Storico
            </h1>
            <p class="text-light opacity-75">
                Inserisci un nuovo evento nel tuo archivio storico.
            </p>
        </div>

        <a href="{{ route('events.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna agli Eventi
        </a>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Titolo</label>
                    <input type="text" name="title" class="form-control bg-secondary text-light border-0" required>
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Descrizione</label>
                    <textarea name="description" rows="4" class="form-control bg-secondary text-light border-0" required></textarea>
                </div>

                {{-- YEAR --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Anno</label>
                    <input type="number" name="year" class="form-control bg-secondary text-light border-0" required>
                </div>

                {{-- PERIOD --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Periodo Storico</label>
                    <select name="period_id" class="form-select bg-secondary text-light border-0" required>
                        @foreach($periods as $period)
                            <option value="{{ $period->id }}">{{ $period->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- HISTORICAL PEOPLE (SELECT MULTIPLA) --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Personaggi Storici Coinvolti</label>
                    <select name="historical_person_ids[]" multiple
                            class="form-select bg-secondary text-light border-0"
                            size="8">
                        @foreach($historicalPeople as $person)
                            <option value="{{ $person->id }}">{{ $person->name }}</option>
                        @endforeach
                    </select>

                    <small class="text-light opacity-75">
                        Tieni premuto CTRL (Windows) o CMD (Mac) per selezionare più personaggi.
                    </small>
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="bi bi-check-circle me-2"></i> Crea Evento
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
