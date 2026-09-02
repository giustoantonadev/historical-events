@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-flag me-2"></i> Eventi Storici
            </h1>
            <p class="text-light opacity-75">
                Archivio completo degli eventi storici con periodi e personaggi collegati.
            </p>
        </div>

        <a href="{{ route('events.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i> Nuovo Evento
        </a>
    </div>

    {{-- CARD WRAPPER --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            {{-- TABELLA --}}
            <table class="table table-dark table-hover align-middle rounded-3 overflow-hidden">
                <thead>
                    <tr class="text-light">
                        <th>Immagine</th>
                        <th>Titolo</th>
                        <th>Periodo</th>
                        <th>Anno</th>
                        <th>Personaggi</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($historicalEvents as $event)
                    <tr>
                        <td class="fw-bold text-light">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}"
                                    class="img-fluid rounded-3 shadow"
                                    style="width: 100px; height: 60px; object-fit: cover;"
                                    alt="{{ $event->title }}">
                            @endif
                        </td>
                        <td class="fw-bold text-light">{{ $event->title }}</td>

                        <td class="text-light opacity-75">
                            {{ $event->period->name }}
                        </td>

                        <td class="text-light opacity-75">
                            {{ $event->year }}
                        </td>

                        <td>
                            @foreach ($event->historicalPeople as $person)
                                <span class="badge bg-primary me-1">
                                    {{ $person->name }}
                                </span>
                            @endforeach
                        </td>

                        <td class="text-end">

                            <a href="{{ route('events.show', $event->id) }}"
                                class="btn btn-outline-light btn-sm me-2">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('events.edit', $event->id) }}"
                                class="btn btn-outline-warning btn-sm me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('events.destroy', $event->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Vuoi eliminare questo evento?')">
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
