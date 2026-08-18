@extends('layouts.app')

@section('content')

<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-pencil-square me-2"></i> Modifica Periodo Storico
            </h1>
            <p class="text-light opacity-75">
                Modifica le informazioni del periodo storico selezionato.
            </p>
        </div>

        <a href="{{ route('periods.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna ai Periodi Storici
        </a>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('periods.update', $period->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- NAME --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Nome</label>
                    <input type="text" name="name" value="{{ $period->name }}" class="form-control bg-secondary text-light border-0" required>
                </div>

                {{-- START DATE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Data Inizio</label>
                    <input type="date" name="start_date" value="{{ $period->start_date }}" class="form-control bg-secondary text-light border-0" required>
                </div>

                {{-- END DATE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Data Fine</label>
                    <input type="date" name="end_date" value="{{ $period->end_date }}" class="form-control bg-secondary text-light border-0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Descrizione</label>
                    <textarea name="description" class="form-control bg-secondary text-light border-0" rows="4">{{ $period->description }}</textarea>
                </div>


                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="bi bi-check-circle me-2"></i> Salva Modifiche
                </button>

            </form>

        </div>
    </div>
</div>
@endsection