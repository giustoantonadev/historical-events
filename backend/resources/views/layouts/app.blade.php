<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical Events</title>

    {{-- BOOTSTRAP 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- BOOTSTRAP ICONS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #0d0d0d;
            color: #f0f0f0;
            min-height: 100vh;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #e0e0e0;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #ffffff;
        }

        footer {
            background: #111;
            padding: 20px 0;
            text-align: center;
            color: #bbb;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="bi bi-clock-history me-2"></i> Archivio Storico
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <i class="bi bi-flag me-1"></i> Eventi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('periods.index') }}">
                            <i class="bi bi-calendar-range me-1"></i> Periodi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('historical-people.index') }}">
                            <i class="bi bi-people me-1"></i> Personaggi
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENUTO DELLE PAGINE --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer>
        <p>© 2026 Archivio Storico — Progetto Laravel</p>
    </footer>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
