@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-plus-circle me-2"></i> Crea Nuovo Personaggio Storico
            </h1>
            <p class="text-light opacity-75">
                Inserisci un nuovo personaggio storico nel tuo archivio.
            </p>
        </div>

        <a href="{{ route('historical_person.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna ai Personaggi Storici
        </a>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('historical_person.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NAME --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Nome</label>
                    <input type="text" name="name" class="form-control bg-secondary text-light border-0" required>
                </div>

                {{-- BIOGRAPHY --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Biografia</label>
                    <textarea name="biography" rows="4" class="form-control bg-secondary text-light border-0" required></textarea>
                </div>

                {{-- IMAGE --}}
                <div class="mb-3">
                    <label class="form-label text-light fw-bold">Immagine</label>
                    <input type="file" name="image" class="form-control bg-secondary text-light border-0">
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="bi bi-check-circle me-2"></i> Crea Personaggio Storico
                </button>

            </form>

        </div>
    </div>

</div>

@endsection