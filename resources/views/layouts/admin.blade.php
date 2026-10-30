<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-100 text-slate-900 antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Kelola Publikasi Ilmiah - ' . config('dosen.nama'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400..700;1,6..72,400..700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col font-sans selection:bg-amber-200 selection:text-slate-900">
    <!-- Top demo warning banner -->
    <aside aria-label="Status Mode UTS" class="border-b border-amber-300 bg-amber-50 px-4 py-2 text-xs text-amber-950">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-amber-500/20 px-2 py-0.5 font-mono text-[10px] font-bold uppercase text-amber-900">
                    Mode Demo UTS
                </span>
                <span>Area CRUD publikasi terbuka tanpa login untuk keperluan evaluasi penguji UTS Website Berbasis Framework.</span>
            </div>
            <a href="{{ route('home') }}" class="font-semibold text-amber-900 underline hover:text-amber-950 shrink-0">
                &larr; Kembali ke Landing Page
            </a>
        </div>
    </aside>

    <!-- Header bar -->
    <header class="border-b border-stone-200 bg-white shadow-xs">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900 text-stone-100 font-serif font-bold text-sm">
                    {{ config('dosen.inisial') ?? 'RP' }}
                </a>
                <div>
                    <h1 class="font-serif font-bold text-slate-900 text-lg leading-tight">
                        Layanan Pengelolaan Publikasi Ilmiah
                    </h1>
                    <p class="text-xs text-stone-500">
                        Basis Data Dosen {{ config('dosen.nama') }} &bull; {{ config('dosen.universitas') }}
                    </p>
                </div>
            </div>

            <nav aria-label="Navigasi Header Admin" class="flex items-center gap-2">
                <a href="{{ route('publications.index') }}"
                   class="rounded-lg px-3 py-1.5 text-xs font-semibold {{ request()->routeIs('publications.index') ? 'bg-slate-900 text-white' : 'text-slate-700 hover:bg-stone-100' }} transition">
                    Daftar Record
                </a>
                <a href="{{ route('publications.create') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-amber-700 px-3 py-1.5 text-xs font-semibold text-white shadow-xs hover:bg-amber-800 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Tambah Data</span>
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1 py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @include('partials.flash')
            @yield('content')
        </div>
    </main>

    <footer class="border-t border-stone-200 bg-white py-4 text-center text-xs text-stone-500">
        Panel Kelola Publikasi &bull; Arsitektur MVC Laravel 13 &bull; Modul CRUD Publikasi & Riset
    </footer>
</body>
</html>
