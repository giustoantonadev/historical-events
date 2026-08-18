@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-light">
            <i class="bi bi-flag-fill me-2"></i> Periodi Storici
        </h1>

        <a href="{{ route('periods.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle me-2"></i> Nuovo Periodo
        </a>
    </div>

    {{-- TABELLA PERIODI --}}
    <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            @if($periods->count() > 0)

            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="table-secondary text-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Inizio</th>
                        <th>Fine</th>
                        <th>Descrizione</th>
                        <th class="text-end" style="width: 200px;">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($periods as $period)
                    <tr>
                        <td class="fw-bold text-light">{{ $period->name }}</td>

                        <td class="text-light opacity-75">{{ $period->start_date }}</td>

                        <td class="text-light opacity-75">{{ $period->end_date }}</td>

                        <td class="text-light opacity-75" style="max-width: 350px;">
                            {{ Str::limit($period->description, 120) }}
                        </td>

                        <td class="text-end">

                            {{-- SHOW --}}
                            <a href="{{ route('periods.show', $period->id) }}"
                                class="btn btn-outline-light btn-sm me-2">
                                <i class="bi bi-eye"></i>
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('periods.edit', $period->id) }}"
                                class="btn btn-warning btn-sm me-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('periods.destroy', $period->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Vuoi eliminare questo periodo?');">
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
                <p class="text-light opacity-50">Non ci sono periodi registrati.</p>
            @endif

        </div>
    </div>

</div>

@endsection
