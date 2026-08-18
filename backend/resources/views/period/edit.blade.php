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

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-warning btn-lg mt-3">
                    <i class="bi bi-check-circle me-2"></i> Aggiorna Periodo
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
