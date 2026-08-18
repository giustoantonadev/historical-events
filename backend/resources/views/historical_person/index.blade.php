@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-people me-2"></i> Personaggi Storici
            </h1>
            <p class="text-light opacity-75">
                Gestisci tutti i personaggi presenti nel tuo archivio storico.
            </p>
        </div>

        <a href="{{ route('historical-people.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i> Nuovo Personaggio
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
                        <th>Biografia</th>
                        <th>Ritratto</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($historical_person as $person)
                    <tr>
                        <td class="fw-bold text-light">{{ $person->name }}</td>

                        <td class="text-light opacity-75" style="max-width: 300px;">
                            {{ Str::limit($person->biography, 120) }}
                        </td>

                        <td>
                            @if($person->portrait)
                            <img src="{{ asset('storage/' . $person->portrait) }}"
                                alt="{{ $person->name }}"
                                class="rounded"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                            <span class="text-light opacity-50">Nessuna immagine</span>
                            @endif
                        </td>

                        <td class="text-end">

                            <a href="{{ route('historical-people.show', $person->id) }}"
                                class="btn btn-outline-light btn-sm me-2">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('historical-people.edit', $person->id) }}"
                                class="btn btn-outline-warning btn-sm me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('historical-people.destroy', $person->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Vuoi eliminare questo personaggio?')">
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