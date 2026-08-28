@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-pencil-square me-2"></i> Modifica Periodo: {{ $period->name }}
        </h1>

        <a href="{{ route('periods.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna ai Periodi
        </a>
    </div>

    {{-- CARD FORM --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('periods.update', $period->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NOME --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Nome del Periodo</label>
                    <input type="text"
                        name="name"
                        class="form-control bg-secondary text-light border-0"
                        value="{{ $period->name }}"
                        required>
                </div>

                {{-- DATA INIZIO --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Data Inizio</label>
                    <input type="date"
                        name="start_date"
                        class="form-control bg-secondary text-light border-0"
                        value="{{ $period->start_date }}"
                        required>
                </div>

                {{-- DATA FINE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Data Fine</label>
                    <input type="date"
                        name="end_date"
                        class="form-control bg-secondary text-light border-0"
                        value="{{ $period->end_date }}"
                        required>
                </div>

                {{-- DESCRIZIONE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Descrizione</label>
                    <textarea name="description"
                        rows="5"
                        class="form-control bg-secondary text-light border-0">{{ $period->description }}</textarea>
                </div>

                {{-- TRANSLATIONS (TABS) --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Traduzioni</label>
                    <ul class="nav nav-tabs" id="periodTranslationTabs" role="tablist">
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
                                <label class="form-label text-light fw-bold">Nome (IT)</label>
                                <input type="text" name="name_it" value="{{ old('name_it', $period->name_it) }}" class="form-control bg-dark text-light border-0">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Descrizione (IT)</label>
                                <textarea name="description_it" rows="3" class="form-control bg-dark text-light border-0">{{ old('description_it', $period->description_it) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Name (EN)</label>
                                <input type="text" name="name_en" value="{{ old('name_en', $period->name_en) }}" class="form-control bg-dark text-light border-0">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Description (EN)</label>
                                <textarea name="description_en" rows="3" class="form-control bg-dark text-light border-0">{{ old('description_en', $period->description_en) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Nom (FR)</label>
                                <input type="text" name="name_fr" value="{{ old('name_fr', $period->name_fr) }}" class="form-control bg-dark text-light border-0">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light fw-bold">Description (FR)</label>
                                <textarea name="description_fr" rows="3" class="form-control bg-dark text-light border-0">{{ old('description_fr', $period->description_fr) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-warning btn-lg mt-3">
                    <i class="bi bi-check-circle me-2"></i> Aggiorna Periodo
                </button>

            </form>

        </div>
    </div>

</div>

@endsection