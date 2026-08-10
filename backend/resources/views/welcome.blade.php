@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- HERO --}}
    <div class="p-5 mb-5 rounded-4 shadow-lg"
         style="background: linear-gradient(135deg, #1a1a1a, #242424); border: 1px solid rgba(255,255,255,0.06);">

        <div class="d-flex align-items-center mb-4">

            <h1 class="fw-bold ms-4 text-light" style="font-size: 2.4rem;">
                Historical Archive Admin <i class="bi bi-archive ms-2"></i>
            </h1>
        </div>

        <p class="fs-5 text-light opacity-75">
            Gestisci Periodi Storici, Personaggi e Eventi con un backoffice moderno, veloce e completamente ottimizzato.
            Tutto in stile dark premium, coerente con il tuo progetto.
        </p>

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3 px-4">
                <i class="bi bi-box-arrow-in-right me-2"></i> Accedi all'area admin
            </a>
        @else
            <a href="{{ url('dashboard') }}" class="btn btn-primary btn-lg mt-3 px-4">
                <i class="bi bi-speedometer2 me-2"></i> Vai alla Dashboard
            </a>
        @endguest
    </div>

    {{-- SEZIONE INFO --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4 text-light">

            <h3 class="fw-bold mb-3">
                <i class="bi bi-info-circle me-2"></i> Informazioni sul progetto
            </h3>

            <p class="fs-5">
                Questo sistema permette di gestire:
            </p>

            <ul class="fs-5 opacity-75">
                <li><i class="bi bi-people-fill me-2"></i> Personaggi Storici</li>
                <li><i class="bi bi-calendar-event me-2"></i> Periodi Storici</li>
                <li><i class="bi bi-flag me-2"></i> Eventi Storici</li>
            </ul>

            <p class="fs-5 mt-3">
                Tutto è stato progettato per essere elegante, coerente e facile da usare.
            </p>

        </div>
    </div>

</div>

@endsection
