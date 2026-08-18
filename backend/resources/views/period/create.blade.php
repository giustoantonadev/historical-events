@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-plus-circle me-2"></i> Crea Nuovo Periodo Storico
            </h1>
            <p class="text-light opacity-75">
                Inserisci un nuovo periodo storico nel tuo archivio.
            </p>
        </div>

        <a href="{{ route('periods.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna ai Periodi
        </a>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            {{-- ERRORI --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('periods.store') }}" method="POST">
                @csrf

                {{-- NAME --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Nome del Periodo</label>
                    <input type="text" name="name"
                           class="form-control bg-secondary text-light border-0"
                           required>
                </div>

                {{-- START DATE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Data Inizio</label>
                    <input type="date" name="start_date"
                           class="form-control bg-secondary text-light border-0"
                           required>
                </div>

                {{-- END DATE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Data Fine</label>
                    <input type="date" name="end_date"
                           class="form-control bg-secondary text-light border-0"
                           required>
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="bi bi-check-circle me-2"></i> Crea Periodo Storico
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
