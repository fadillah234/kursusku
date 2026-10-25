<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteName }} - Belajar Online</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


 
</head>
<body>
    <header>
        <h1>{{ $siteName }}</h1>
        <p>Platform belajar online untuk mengembangkan keterampilanmu.</p>
    </header>

    <main>
        
<section class="hero">
    <div>
        <h2>Mulai Perjalanan Belajarmu!</h2>
        <p>Pilih kursus yang sesuai dengan minat dan tujuanmu.</p>
    </div>

    <img src="{{ asset('images/hero-kursus.jpg') }}"
         alt="Ilustrasi kelas KursusKu">
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

    <footer>
        &copy; {{ date('Y') }} {{ $siteName }}. Belajar dan berkembang bersama.
    </footer>
</body>
</html>