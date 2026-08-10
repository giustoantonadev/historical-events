<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }}</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: #121212;
            color: #eaeaea;
        }
        .auth-card {
            background: #1e1e1e;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 0 25px rgba(0,0,0,0.4);
        }
        .form-control {
            background: #2a2a2a;
            border: none;
            color: #fff;
        }
        .form-control:focus {
            background: #333;
            color: #fff;
            box-shadow: 0 0 0 2px #0d6efd;
        }
        a {
            color: #9bbcff;
        }
        a:hover {
            color: #c7d8ff;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="auth-card" style="width: 420px;">
        {{ $slot }}
    </div>

</body>
</html>
