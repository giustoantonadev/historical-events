@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </h1>
        <p class="text-light opacity-75">
            Panoramica del sistema storico: periodi, personaggi ed eventi.
        </p>
    </div>

    {{-- KPI CARDS --}}
    <div class="row g-4 mb-5">

        {{-- Eventi --}}
        <div class="col-md-4">
            <div class="p-4 rounded-4 shadow-lg"
                style="background: linear-gradient(135deg, #1f1f1f, #292929); border: 1px solid rgba(255,255,255,0.06);">
                <h4 class="text-light fw-bold mb-2">
                    <i class="bi bi-flag me-2"></i> Eventi Storici
                </h4>
                <p class="text-light opacity-75 mb-3">
                    Gestisci eventi e collegamenti.
                </p>
                <a href="{{ url('events') }}" class="btn btn-primary w-100">
                    Vai agli Eventi
                </a>
            </div>
        </div>

        {{-- Periodi --}}
        <div class="col-md-4">
            <div class="p-4 rounded-4 shadow-lg"
                style="background: linear-gradient(135deg, #1f1f1f, #292929); border: 1px solid rgba(255,255,255,0.06);">
                <h4 class="text-light fw-bold mb-2">
                    <i class="bi bi-calendar-event me-2"></i> Periodi Storici
                </h4>
                <p class="text-light opacity-75 mb-3">
                    Gestisci le epoche storiche.
                </p>
                <a href="{{ url('periods') }}" class="btn btn-primary w-100">
                    Vai ai Periodi
                </a>
            </div>
        </div>

        {{-- Personaggi --}}
        <div class="col-md-4">
            <div class="p-4 rounded-4 shadow-lg"
                style="background: linear-gradient(135deg, #1f1f1f, #292929); border: 1px solid rgba(255,255,255,0.06);">
                <h4 class="text-light fw-bold mb-2">
                    <i class="bi bi-people-fill me-2"></i> Personaggi Storici
                </h4>
                <p class="text-light opacity-75 mb-3">
                    Gestisci figure e biografie.
                </p>
                <a href="{{ url('historical-people') }}" class="btn btn-primary w-100">
                    Vai ai Personaggi
                </a>
            </div>
        </div>


    </div>

    {{-- SEZIONE INTRO --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4 text-light">

            <h3 class="fw-bold mb-3">
                <i class="bi bi-info-circle me-2"></i> Informazioni
            </h3>

            <p class="fs-5 opacity-75">
                Questo pannello ti permette di gestire l’intero archivio storico:
                periodi, personaggi ed eventi, con un’interfaccia moderna e coerente.
            </p>

        </div>
    </div>

    {{-- MESSAGES QUICK ACCESS --}}
    <div class="mt-4">
        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #121212, #1b1b1b); border:1px solid rgba(255,255,255,0.04)">
            <h5 class="text-light mb-2"><i class="bi bi-envelope-fill me-2"></i> Messaggi</h5>
            <p class="text-light opacity-75 mb-2">Visualizza le richieste di contatto e supporto inviate dagli utenti.</p>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-light">Apri Messages</a>
        </div>
    </div>

</div>

@endsection