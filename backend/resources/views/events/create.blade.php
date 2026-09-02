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

                {{-- IMAGE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Immagine</label>
                    <input type="file" name="image" class="form-control bg-secondary text-light border-0">
                </div>

                {{-- TRANSLATIONS (TABS) --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Traduzioni</label>
                    <ul class="nav nav-tabs" id="eventTranslationTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="it-tab" data-bs-toggle="tab" data-bs-target="#it" type="button" role="tab" aria-controls="it" aria-selected="true">Italiano</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="en" aria-selected="false">English</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr" type="button" role="tab" aria-controls="fr" aria-selected="false">Français</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3 bg-secondary rounded-3">
                        <div class="tab-pane fade show active" id="it" role="tabpanel" aria-labelledby="it-tab">
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Titolo (IT)</label>
                                <input type="text" name="title_it" value="{{ old('title_it') }}" class="form-control bg-dark text-light border-0">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Descrizione (IT)</label>
                                <textarea name="description_it" rows="3" class="form-control bg-dark text-light border-0">{{ old('description_it') }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Title (EN)</label>
                                <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control bg-dark text-light border-0">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Description (EN)</label>
                                <textarea name="description_en" rows="3" class="form-control bg-dark text-light border-0">{{ old('description_en') }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Titre (FR)</label>
                                <input type="text" name="title_fr" value="{{ old('title_fr') }}" class="form-control bg-dark text-light border-0">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Description (FR)</label>
                                <textarea name="description_fr" rows="3" class="form-control bg-dark text-light border-0">{{ old('description_fr') }}</textarea>
                            </div>
                        </div>
                    </div>
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