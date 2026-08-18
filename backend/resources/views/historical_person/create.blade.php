@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-plus-circle me-2"></i> Aggiungi Personaggio Storico
        </h1>

        <a href="{{ route('historical-people.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna alla Lista
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

            <form action="{{ route('historical-people.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- LEFT COLUMN: IMAGE UPLOAD --}}
                    <div class="col-md-4 mb-4">

                        <h5 class="text-light fw-bold mb-3">Immagine del Personaggio</h5>

                        <div class="bg-secondary rounded-4 d-flex align-items-center justify-content-center shadow-lg mb-3"
                            style="width: 100%; max-width: 280px; height: 280px;">
                            <i class="bi bi-person-fill text-light" style="font-size: 5rem;"></i>
                        </div>

                        <label class="form-label text-light fw-bold">Carica immagine</label>
                        <input type="file"
                            name="portrait"
                            class="form-control bg-secondary text-light border-0">
                    </div>

                    {{-- RIGHT COLUMN: FIELDS --}}
                    <div class="col-md-8">

                        {{-- NAME --}}
                        <div class="mb-3">
                            <label class="form-label text-light fw-bold">Nome</label>
                            <input type="text"
                                name="name"
                                class="form-control bg-secondary text-light border-0"
                                placeholder="Es. Leonardo da Vinci"
                                required>
                        </div>

                        {{-- BIOGRAPHY --}}
                        <div class="mb-3">
                            <label class="form-label text-light fw-bold">Biografia</label>
                            <textarea name="biography"
                                rows="6"
                                class="form-control bg-secondary text-light border-0"
                                placeholder="Inserisci una breve biografia..."
                                required></textarea>
                        </div>

                        {{-- BIRTH YEAR --}}
                        <div class="mb-3">
                            <label class="form-label text-light fw-bold">Anno di nascita</label>
                            <input type="number"
                                name="birth_year"
                                class="form-control bg-secondary text-light border-0"
                                placeholder="Es. -356"
                                required>
                        </div>


                        {{-- SUBMIT --}}
                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                            <i class="bi bi-check-circle me-2"></i> Crea Personaggio
                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection