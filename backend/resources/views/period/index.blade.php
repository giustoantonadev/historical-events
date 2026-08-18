@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-calendar-range me-2"></i> Periodi Storici
            </h1>
            <p class="text-light opacity-75">
                Gestisci tutti i periodi del tuo archivio storico.
            </p>
        </div>

        <a href="{{ route('periods.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i> Nuovo Periodo
        </a>
    </div>

    {{-- CARD WRAPPER --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            {{-- TABELLA --}}
            <table class="table table-dark table-hover align-middle rounded-3 overflow-hidden">
                <thead>
                    <tr class="text-light">
                        <th>Nome</th>
                        <th>Data Inizio</th>
                        <th>Data Fine</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($periods as $period)
                    <tr>
                        <td class="fw-bold text-light">{{ $period->name }}</td>

                        <td class="text-light opacity-75">
                            {{ $period->start_date }}
                        </td>

                        <td class="text-light opacity-75">
                            {{ $period->end_date }}
                        </td>

                        <td class="text-end">

                            <a href="{{ route('periods.edit', $period->id) }}"
                                class="btn btn-outline-warning btn-sm me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('periods.destroy', $period->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo periodo?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
