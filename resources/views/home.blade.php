
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $siteName }} - Belajar Online</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #263238;
        }

        /* NAVBAR BARU */
        .kursusku-navbar {
            width: 100%;
            min-height: 65px;
            padding: 15px 7%;
            background: #0d6efd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 9999;
        }

        .kursusku-navbar .logo {
            color: white;
            font-size: 23px;
            font-weight: bold;
            text-decoration: none;
        }

        .kursusku-navbar .menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .kursusku-navbar .menu a {
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
        }

        .kursusku-navbar .menu a:hover {
            color: #dbeafe;
            text-decoration: underline;
        }

        /* HEADER */
        header {
            background: #1746a2;
            color: white;
            padding: 22px 8%;
        }

        header h1 {
            margin: 0;
        }

        /* KONTEN */
        main {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 32px;
            align-items: center;
            background: white;
            padding: 32px;
            border-radius: 12px;
            margin-bottom: 28px;
        }

        .hero img {
            width: 100%;
            border-radius: 12px;
        }

        .btn-daftar {
            display: inline-block;
            margin-top: 12px;
            padding: 12px 22px;
            border-radius: 6px;
            background: #0d6efd;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-daftar:hover {
            background: #0b5ed7;
        }

        .courses {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .course {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .course h3 {
            color: #1746a2;
        }

        .code {
            font-size: 13px;
            color: #64748b;
        }

        footer {
            text-align: center;
            padding: 24px;
            color: #64748b;
        }

        /* TAMPILAN HP */
        @media (max-width: 600px) {
            .kursusku-navbar {
                flex-direction: column;
                gap: 15px;
            }

            .kursusku-navbar .menu {
                gap: 20px;
            }

            .hero {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="kursusku-navbar">
        <a href="{{ route('home') }}" class="logo">
            KursusKu
        </a>

        <div class="menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('enrollments.create') }}">Pendaftaran</a>
        </div>
    </nav>

    <!-- HEADER -->
    <header>
        <h1>{{ $siteName }}</h1>
        <p>Platform belajar online untuk mengembangkan keterampilanmu.</p>
    </header>

    <!-- KONTEN UTAMA -->
    <main>
        <section class="hero">
            <div>
                <h2>Mulai Perjalanan Belajarmu!</h2>

                <p>
                    Pilih kursus yang sesuai dengan minat dan tujuanmu.
                </p>

                <a href="{{ route('enrollments.create') }}" class="btn-daftar">
                    Daftar Sekarang
                </a>
            </div>

            <img
                src="{{ asset('images/hero-kursus.jpg') }}"
                alt="Ilustrasi kelas KursusKu"
            >
        </section>

        <h2>Program Belajar Unggulan</h2>

        <section class="courses">
            @foreach ($featured as $course)
                <article class="course">
                    <span class="code">{{ $course['code'] }}</span>
                    <h3>{{ $course['title'] }}</h3>
                    <p>{{ $course['description'] }}</p>
                </article>
            @endforeach
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} {{ $siteName }}.
        Belajar dan berkembang bersama.
    </footer>

</body>
</html>
