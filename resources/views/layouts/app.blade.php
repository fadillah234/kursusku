<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'KursusKu')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                KursusKu
            </a>

            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                <a class="nav-link" href="{{ route('courses.index') }}">
                    Daftar Kursus
                </a>
            </div>

        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="text-center py-3 text-muted">
        &copy; {{ date('Y') }} KursusKu
    </footer>

</body>
</html>