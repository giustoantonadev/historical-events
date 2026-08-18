@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-light">
                <i class="bi bi-people-fill me-2"></i> Personaggi Storici
            </h1>
            <p class="text-light opacity-75">
                Gestisci tutti i personaggi del tuo archivio storico.
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
                        <th style="width: 80px;">Immagine</th>
                        <th>Nome</th>
                        <th>Anno di nascita</th>
                        <th>Biografia</th>
                        <th class="text-end" style="width: 220px;">Azioni</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($historicalPeople as $person)
                    <tr>

                        {{-- IMAGE --}}
                        <td>
                            @if($person->portrait)
                            <img src="{{ asset('storage/' . $person->portrait) }}"
                                class="rounded"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-person-fill text-light" style="font-size: 1.8rem;"></i>
                            </div>
                            @endif
                        </td>

                        {{-- NAME --}}
                        <td class="fw-bold text-light">
                            {{ $person->name }}
                        </td>

                        {{-- BIRTH YEAR --}}
                        <td class="text-light opacity-75">
                            {{ $person->birth_year }}
                        </td>

                        {{-- BIOGRAPHY --}}
                        <td class="text-light opacity-75">
                            {{ Str::limit($person->biography, 120) }}
                        </td>

                        {{-- ACTIONS --}}
                        <td class="text-end">

                            {{-- SHOW --}}
                            <a href="{{ route('historical-people.show', $person->id) }}"
                                class="btn btn-outline-light btn-sm me-2">
                                <i class="bi bi-eye"></i>
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('historical-people.edit', $person->id) }}"
                                class="btn btn-outline-warning btn-sm me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('historical-people.destroy', $person->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo personaggio?')">
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