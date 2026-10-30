<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth bg-stone-50 text-slate-900 antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('dosen.nama') . ' - Profil Dosen ' . config('dosen.prodi') . ' UNCP')</title>
    <meta name="description" content="@yield('meta_description', 'Landing page profil dosen ' . config('dosen.nama') . ' - Program Studi ' . config('dosen.prodi') . ', ' . config('dosen.fakultas') . ', ' . config('dosen.universitas') . '.')">
    <meta name="author" content="{{ config('dosen.nama') }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', config('dosen.nama') . ' - Profil Dosen ' . config('dosen.prodi') . ' UNCP')">
    <meta property="og:description" content="@yield('meta_description', 'Landing page profil dosen terintegrasi database dengan arsitektur MVC Laravel 13.')">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Google Fonts: Newsreader for serif editorial headlines -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400..700;1,6..72,400..700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- JSON-LD Structured Data: Person / Academic -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => config('dosen.nama_pendek'),
        'honorificPrefix' => config('dosen.gelar_depan'),
        'honorificSuffix' => config('dosen.gelar_belakang'),
        'jobTitle' => 'Dosen ' . config('dosen.prodi'),
        'worksFor' => [
            '@type' => 'CollegeOrUniversity',
            'name' => config('dosen.universitas'),
        ],
        'alumniOf' => array_map(function ($edu) {
            return [
                '@type' => 'CollegeOrUniversity',
                'name' => $edu['institusi'],
            ];
        }, config('dosen.pendidikan') ?? []),
        'knowsAbout' => config('dosen.keahlian'),
        'sameAs' => array_filter([
            config('dosen.google_scholar.url'),
            config('dosen.sinta.url'),
            config('dosen.orcid.url'),
        ]),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
</head>
<body class="min-h-full flex flex-col font-sans selection:bg-amber-200 selection:text-slate-900">
    <!-- Skip to content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:rounded-lg focus:bg-slate-900 focus:px-4 focus:py-2 focus:text-white focus:outline-none focus:ring-2 focus:ring-amber-500">
        Lewati ke konten utama
    </a>

    @include('partials.navbar')

    <main id="main-content" class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
