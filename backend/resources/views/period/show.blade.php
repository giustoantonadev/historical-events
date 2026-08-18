@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-flag me-2"></i> {{ $period->name }}
        </h1>

        <a href="{{ route('periods.index') }}" class="btn btn-outline-light btn-lg">
            <i class="bi bi-arrow-left me-2"></i> Torna ai Periodi
        </a>
    </div>

    {{-- CARD --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4 mb-4">
        <div class="card-body p-4">

            <h3 class="fw-bold text-light mb-3">Informazioni sul Periodo</h3>

            <div class="text-light fs-5 mb-3">
                <strong>Nome:</strong> {{ $period->name }}
            </div>

            <div class="text-light fs-5 mb-3">
                <strong>Data Inizio:</strong> {{ $period->start_date }}
            </div>

            <div class="text-light fs-5 mb-3">
                <strong>Data Fine:</strong> {{ $period->end_date }}
            </div>

        </div>
    </div>

    {{-- EVENTI COLLEGATI --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <h3 class="fw-bold text-light mb-3">
                <i class="bi bi-calendar-event me-2"></i> Eventi Collegati
            </h3>

            @if($period->historicalEvents->count() > 0)

            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="table-secondary text-dark">
                    <tr>
                        <th>Titolo</th>
                        <th>Anno</th>
                        <th>Personaggi</th>
                        <th class="text-end" style="width: 180px;">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($period->historicalEvents as $event)
                    <tr>
                        <td class="fw-bold text-light">{{ $event->title }}</td>

                        <td class="text-light opacity-75">{{ $event->year }}</td>

                        <td>
                            @foreach($event->historicalPeople as $person)
                            <span class="badge bg-primary me-1">{{ $person->name }}</span>
                            @endforeach
                        </td>

                        <td class="text-end">
                            <a href="{{ route('events.show', $event->id) }}"
                                class="btn btn-outline-light btn-sm me-2">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('events.edit', $event->id) }}"
                                class="btn btn-warning btn-sm me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('events.destroy', $event->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Vuoi eliminare questo evento?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            @else
            <p class="text-light opacity-50">Nessun evento collegato a questo periodo.</p>
            @endif

        </div>
    </div>

</div>

@endsection