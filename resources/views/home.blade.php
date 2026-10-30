@extends('layouts.app')

@section('title', $dosen['nama'] . ' - Profil Dosen ' . $dosen['prodi'] . ' UNCP')
@section('meta_description', 'Landing page profil dosen ' . $dosen['nama'] . ' - Program Studi ' . $dosen['prodi'] . ', ' . $dosen['fakultas'] . ', ' . $dosen['universitas'] . '.')

@section('content')
    <!-- ================================================================= -->
    <!-- 1. HERO SECTION                                                   -->
    <!-- ================================================================= -->
    <section id="hero" class="relative overflow-hidden border-b border-stone-200/80 bg-gradient-to-b from-stone-100/70 via-stone-50 to-white pt-12 pb-16 sm:pt-20 sm:pb-24">
        <!-- Subtle background grid pattern -->
        <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(to_right,#e2e0d8_1px,transparent_1px),linear-gradient(to_bottom,#e2e0d8_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-35" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                <!-- Col Left: Profile Identity & Content (7 cols) -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Academic Badge -->
                    <div class="inline-flex items-center gap-2 rounded-full border border-stone-300/80 bg-white/90 px-3.5 py-1 text-xs font-medium text-slate-800 shadow-2xs backdrop-blur">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse" aria-hidden="true"></span>
                        <span>Dosen Tetap &bull; {{ $dosen['prodi'] }}</span>
                    </div>

                    <!-- Name & Title -->
                    <div class="space-y-2">
                        <h1 class="font-serif font-bold tracking-tight text-slate-900 text-3xl sm:text-4xl md:text-5xl leading-tight">
                            {{ $dosen['nama'] }}
                        </h1>
                        <p class="text-base sm:text-lg text-amber-900/90 font-medium">
                            {{ $dosen['prodi'] }}, {{ $dosen['fakultas'] }}
                        </p>
                        <p class="text-xs sm:text-sm text-stone-500">
                            {{ $dosen['universitas'] }}
                        </p>
                    </div>

                    <!-- Expertise Tags -->
                    <div class="flex flex-wrap items-center gap-2 pt-1" aria-label="Bidang Keahlian">
                        <span class="text-xs font-semibold uppercase tracking-wider text-stone-500 mr-1">Bidang Keahlian:</span>
                        @foreach ($dosen['keahlian'] as $bidang)
                            <span class="inline-flex items-center rounded-lg border border-amber-300/70 bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-900 shadow-2xs">
                                <svg class="h-3.5 w-3.5 text-amber-700 mr-1.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                {{ $bidang }}
                            </span>
                        @endforeach
                    </div>

                    <!-- Brief description -->
                    <p class="text-sm sm:text-base text-stone-600 leading-relaxed max-w-2xl">
                        {{ $dosen['deskripsi'] }}
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a href="#publikasi-terbaru"
                           class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-amber-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 transition">
                            <span>Lihat Publikasi</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                            </svg>
                        </a>

                        <a href="#kontak"
                           class="inline-flex items-center gap-2 rounded-xl border border-stone-300 bg-white px-5 py-3 text-sm font-semibold text-slate-800 shadow-2xs hover:bg-stone-100 hover:text-slate-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 transition">
                            <span>Kontak</span>
                            <svg class="h-4 w-4 text-stone-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </a>

                        <a href="{{ route('publications.index') }}"
                           class="inline-flex items-center gap-1.5 rounded-xl border border-amber-300/80 bg-amber-50/70 px-4 py-3 text-xs font-semibold text-amber-900 hover:bg-amber-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 transition">
                            <svg class="h-4 w-4 text-amber-700" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            <span>Layanan CRUD</span>
                            <span class="rounded bg-amber-200/80 px-1 py-0.5 text-[10px] font-mono uppercase">UTS</span>
                        </a>
                    </div>

                    <!-- External academic profile links -->
                    <div class="flex items-center gap-4 pt-2 text-xs text-stone-600">
                        <span class="text-stone-400 font-medium">Profil Akademik Resmi:</span>
                        <a href="{{ $dosen['sinta']['url'] }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 font-semibold text-amber-800 hover:text-amber-950 underline decoration-amber-300 underline-offset-4">
                            <span>SINTA (ID: {{ $dosen['sinta']['id'] }})</span>
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </a>
                        <span class="text-stone-300" aria-hidden="true">&bull;</span>
                        <a href="{{ $dosen['google_scholar']['url'] }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 font-semibold text-amber-800 hover:text-amber-950 underline decoration-amber-300 underline-offset-4">
                            <span>Google Scholar</span>
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Col Right: Portrait / Monogram Card (5 cols) -->
                <div class="lg:col-span-5 flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-sm">
                        <!-- Decorative back card -->
                        <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-amber-200/50 via-stone-200/40 to-slate-200/50 blur-lg" aria-hidden="true"></div>

                        <div class="relative rounded-3xl border border-stone-200/90 bg-white p-6 shadow-xl space-y-6">
                            <!-- Lecturer Photo / Monogram Portrait -->
                            <div class="aspect-4/4 w-full rounded-2xl bg-gradient-to-br from-slate-900 via-slate-800 to-amber-950 p-6 flex flex-col items-center justify-center text-center text-white relative overflow-hidden shadow-inner">
                                <div class="absolute inset-0 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px] opacity-10" aria-hidden="true"></div>

                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="flex h-28 w-28 items-center justify-center rounded-2xl border-2 border-amber-400/40 bg-white/10 shadow-lg backdrop-blur-sm">
                                        <span class="font-serif text-4xl sm:text-5xl font-bold tracking-tight text-amber-100">
                                            {{ $dosen['inisial'] ?? 'RP' }}
                                        </span>
                                    </div>
                                    <span class="mt-4 font-serif text-lg font-bold text-stone-100">
                                        {{ $dosen['nama_pendek'] }}
                                    </span>
                                    <span class="text-xs text-amber-200/90 font-medium">
                                        Dosen Tetap &bull; {{ $dosen['prodi'] }}
                                    </span>
                                </div>

                                <div class="absolute bottom-2 right-3 text-[10px] font-mono text-stone-400">
                                    FKIP &bull; UNCP
                                </div>
                            </div>

                            <!-- Fast stats under avatar -->
                            <div class="grid grid-cols-2 gap-3 text-center">
                                <div class="rounded-xl border border-stone-200 bg-stone-50 p-3">
                                    <div class="text-[11px] font-medium text-stone-500">Basis Data Sitasi</div>
                                    <div class="font-serif text-xl font-bold text-slate-900">{{ $stats['total_citations'] }}</div>
                                    <div class="text-[10px] text-stone-400">Google Scholar / SINTA</div>
                                </div>
                                <div class="rounded-xl border border-stone-200 bg-stone-50 p-3">
                                    <div class="text-[11px] font-medium text-stone-500">Artikel Terindeks</div>
                                    <div class="font-serif text-xl font-bold text-amber-800">{{ $stats['total_publications'] }}</div>
                                    <div class="text-[10px] text-stone-400">Database Aplikasi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================= -->
    <!-- 1B. STATS COUNTER STRIP (Dynamic from DB)                         -->
    <!-- ================================================================= -->
    <section class="border-b border-stone-200/80 bg-white py-8" aria-label="Ringkasan Kinerja Akademik">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 divide-y md:divide-y-0 md:divide-x divide-stone-200">
                <div class="pt-4 md:pt-0 md:px-4 text-center">
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-slate-900">{{ $stats['total_publications'] }}</p>
                    <p class="text-xs sm:text-sm font-medium text-stone-600 mt-1">Publikasi Terdaftar di DB</p>
                    <p class="text-[11px] text-stone-400">Dikelola via Laravel Eloquent</p>
                </div>
                <div class="pt-4 md:pt-0 md:px-4 text-center">
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-amber-800">{{ $stats['total_citations'] }}</p>
                    <p class="text-xs sm:text-sm font-medium text-stone-600 mt-1">Total Sitasi Akademik</p>
                    <p class="text-[11px] text-stone-400">Tercatat di Google Scholar</p>
                </div>
                <div class="pt-4 md:pt-0 md:px-4 text-center">
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-slate-900">{{ $stats['h_index'] }}</p>
                    <p class="text-xs sm:text-sm font-medium text-stone-600 mt-1">H-Index SINTA</p>
                    <p class="text-[11px] text-stone-400">Kemendiktisaintek RI</p>
                </div>
                <div class="pt-4 md:pt-0 md:px-4 text-center">
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-slate-900">{{ $stats['courses_count'] }}</p>
                    <p class="text-xs sm:text-sm font-medium text-stone-600 mt-1">Mata Kuliah Diampu</p>
                    <p class="text-[11px] text-stone-400">Termasuk Website Berbasis Framework</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================= -->
    <!-- 2. TENTANG DOSEN & FOKUS RISET                                   -->
    <!-- ================================================================= -->
    <section id="tentang" class="py-16 sm:py-24 border-b border-stone-200/80 bg-stone-50/60">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
                <!-- Section Header (4 cols) -->
                <div class="lg:col-span-4 space-y-3">
                    <span class="text-xs font-mono font-semibold uppercase tracking-wider text-amber-800">
                        01 &bull; Profil &amp; Minat
                    </span>
                    <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
                        Tentang Dosen
                    </h2>
                    <p class="text-sm text-stone-600 leading-relaxed">
                        Latar belakang akademik, dedikasi pengajaran, serta peta jalan riset pada ranah English Language Teaching (ELT), flipped learning, dan inovasi pedagogi pendidikan dasar.
                    </p>
                </div>

                <!-- Section Body: Narrative + 2 Research Focus Cards (8 cols) -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Bio narrative -->
                    <div class="rounded-2xl border border-stone-200 bg-white p-6 sm:p-8 shadow-xs space-y-4 text-sm sm:text-base text-stone-700 leading-relaxed">
                        <p>
                            <strong class="font-serif font-semibold text-slate-900">{{ $dosen['nama'] }}</strong> adalah dosen tetap pada Program Studi {{ $dosen['prodi'] }}, {{ $dosen['fakultas'] }}, {{ $dosen['universitas'] }}. Menyelesaikan pendidikan Sarjana (S1) di UNCP Palopo, serta Magister Pendidikan (S2) dan Program Doktor (S3) Pendidikan Bahasa Inggris pada Pascasarjana Universitas Negeri Makassar (UNM).
                        </p>
                        <p>
                            Fokus minat riset berpusat pada <em>English Language Teaching (ELT)</em>, <em>flipped learning-based instruction</em>, <em>integrasi platform e-learning/Moodle</em>, serta <em>linguistik terapan dan analisis ekolinguistik</em>. Beliau mengampu mata kuliah pengajaran bahasa dan teknologi pendidikan dasar seperti Bahasa Inggris Dasar, Pembelajaran Bahasa Inggris di SD, Media & Teknologi Pembelajaran, dan Metodologi Penelitian Pendidikan.
                        </p>
                    </div>

                    <!-- Research Focus Cards (Minat Riset) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Card 1: ELT & Flipped Learning -->
                        <div class="rounded-2xl border border-stone-200/90 bg-white p-6 shadow-xs hover:border-amber-400 transition space-y-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-900">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <h3 class="font-serif font-bold text-slate-900 text-lg">ELT &amp; Flipped Learning</h3>
                            <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                                Riset penerapan pendekatan flipped classroom, dinamika motivasi belajar bahasa (attractor states), scaffolding techniques, dan pengembangan materi instruksional bahasa Inggris untuk siswa sekolah dasar dan mahasiswa.
                            </p>
                            <div class="pt-2">
                                <span class="text-[11px] font-mono text-amber-800 bg-amber-50 rounded px-2 py-0.5 border border-amber-200">
                                    Flipped Learning &bull; ELT Pedagogy &bull; Scaffolding
                                </span>
                            </div>
                        </div>

                        <!-- Card 2: E-Learning & Applied Linguistics -->
                        <div class="rounded-2xl border border-stone-200/90 bg-white p-6 shadow-xs hover:border-amber-400 transition space-y-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3" />
                                </svg>
                            </div>
                            <h3 class="font-serif font-bold text-slate-900 text-lg">E-Learning &amp; Linguistik Terapan</h3>
                            <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                                Pengukuran persepsi mahasiswa terhadap platform e-learning/Moodle dengan Rasch model, integrasi teknologi AI dalam penulisan akademik, serta kajian ekolinguistik pada folklor naskah lontar daerah.
                            </p>
                            <div class="pt-2">
                                <span class="text-[11px] font-mono text-slate-800 bg-stone-100 rounded px-2 py-0.5 border border-stone-200">
                                    Moodle ELT &bull; Rasch Model &bull; Ecolinguistics
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================= -->
    <!-- 3. INFORMASI AKADEMIK (Minimal 3 Kelompok)                        -->
    <!-- Kelompok A: Pendidikan                                            -->
    <!-- Kelompok B: Mata Kuliah                                           -->
    <!-- Kelompok C: Publikasi & Riset                                     -->
    <!-- ================================================================= -->
    <section id="akademik" class="py-16 sm:py-24 border-b border-stone-200/80 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-12">
            <!-- Header -->
            <div class="max-w-2xl space-y-2">
                <span class="text-xs font-mono font-semibold uppercase tracking-wider text-amber-800">
                    02 &bull; Informasi Akademik
                </span>
                <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
                    Tiga Pilar Informasi Akademik
                </h2>
                <p class="text-sm text-stone-600">
                    Memenuhi spesifikasi UTS: Pendidikan resmi, portofolio pengajaran mata kuliah, dan rekam jejak publikasi ilmiah terverifikasi.
                </p>
            </div>

            <!-- 3 Columns Group -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- ========================================== -->
                <!-- PILAR 1: PENDIDIKAN                        -->
                <!-- ========================================== -->
                <div class="rounded-2xl border border-stone-200 bg-stone-50/50 p-6 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-700 text-white font-mono text-sm font-bold">
                                A
                            </span>
                            <div>
                                <h3 class="font-serif font-bold text-slate-900 text-lg">Pendidikan</h3>
                                <p class="text-xs text-stone-500">Riwayat studi sarjana dan magister</p>
                            </div>
                        </div>

                        <!-- Timeline -->
                        <div class="space-y-4 pt-2">
                            @foreach ($dosen['pendidikan'] as $edu)
                                <div class="relative pl-6 pb-2 border-l-2 border-amber-300 last:border-transparent">
                                    <div class="absolute -left-1.5 top-1 h-3 w-3 rounded-full border-2 border-amber-600 bg-white"></div>
                                    <div class="flex items-center gap-2">
                                        <span class="rounded bg-amber-100 px-1.5 py-0.5 font-mono text-[11px] font-bold text-amber-900">
                                            {{ $edu['jenjang'] }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-800">{{ $edu['program'] }}</span>
                                    </div>
                                    <p class="text-xs text-stone-600 font-medium mt-1">{{ $edu['institusi'] }}</p>
                                    <p class="text-[11px] text-stone-400 mt-0.5">{{ $edu['tahun'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-xl border border-stone-200 bg-white p-3 text-[11px] text-stone-500">
                        Kualifikasi linear pada ranah Pendidikan Bahasa Inggris dan Inovasi Pedagogi.
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- PILAR 2: MATA KULIAH                       -->
                <!-- ========================================== -->
                <div class="rounded-2xl border border-stone-200 bg-stone-50/50 p-6 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900 text-white font-mono text-sm font-bold">
                                B
                            </span>
                            <div>
                                <h3 class="font-serif font-bold text-slate-900 text-lg">Mata Kuliah</h3>
                                <p class="text-xs text-stone-500">Pengajaran semester aktif di prodi</p>
                            </div>
                        </div>

                        <!-- Course List -->
                        <div class="space-y-3 pt-2">
                            @foreach ($dosen['mata_kuliah'] as $mk)
                                <div class="rounded-xl border border-stone-200/80 bg-white p-3.5 shadow-2xs hover:border-amber-400 transition">
                                    <div class="flex items-center justify-between text-xs mb-1">
                                        <span class="font-semibold text-slate-900">{{ $mk }}</span>
                                        <span class="text-[10px] font-mono rounded bg-stone-100 px-1.5 py-0.5 text-stone-600">S1</span>
                                    </div>
                                    <p class="text-[11px] text-stone-500">
                                        @if ($mk === 'Bahasa Inggris Dasar (Basic English)')
                                            Penguasaan dasar tata bahasa Inggris, keterampilan komunikasi aktif, dan ekspresi akademik.
                                        @elseif ($mk === 'Pembelajaran Bahasa Inggris di SD')
                                            Metodologi pengajaran bahasa bagi pembelajar muda (young learners) di jenjang sekolah dasar.
                                        @elseif ($mk === 'Media & Teknologi Pembelajaran (E-Learning)')
                                            Implementasi platform Moodle, Google Sites, dan integrasi perangkat AI dalam efisiensi instruksional digital.
                                        @else
                                            Rancangan riset kuantitatif, kualitatif, pengukuran Rasch model, dan systematic literature review (SLR).
                                        @endif
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-xl border border-stone-200 bg-white p-3 text-[11px] text-stone-500">
                        Kurikulum berorientasi penguasaan pedagogi modern dan integrasi teknologi pembelajaran.
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- PILAR 3: PUBLIKASI & RISET                 -->
                <!-- ========================================== -->
                <div class="rounded-2xl border border-amber-300/80 bg-amber-50/40 p-6 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-800 text-white font-mono text-sm font-bold">
                                C
                            </span>
                            <div>
                                <h3 class="font-serif font-bold text-slate-900 text-lg">Publikasi &amp; Riset</h3>
                                <p class="text-xs text-stone-500">Karya terindeks &amp; layanan data dinamis</p>
                            </div>
                        </div>

                        <div class="space-y-3 text-xs text-stone-700 leading-relaxed pt-2">
                            <p>
                                Daftar artikel jurnal ilmiah diintegrasikan secara dinamis melalui arsitektur <strong>Route &rarr; Controller &rarr; Model &rarr; Database &rarr; Blade</strong>.
                            </p>
                            <div class="space-y-2 rounded-xl bg-white p-3 border border-amber-200 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-stone-500">Jumlah di Database:</span>
                                    <span class="font-bold text-slate-900">{{ $stats['total_publications'] }} Artikel</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-stone-500">Total Sitasi:</span>
                                    <span class="font-bold text-amber-800">{{ $stats['total_citations'] }} Kutipan</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-stone-500">Sumber Validasi:</span>
                                    <span class="font-bold text-slate-900">Google Scholar / SINTA</span>
                                </div>
                            </div>
                            <p class="text-[11px] text-stone-500">
                                Disediakan form CRUD untuk menambah, mengedit, atau menghapus publikasi langsung dari panel aplikasi.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <a href="{{ route('publikasi') }}"
                           class="inline-flex items-center justify-center gap-1.5 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white hover:bg-slate-800 transition">
                            <span>Buka Katalog Lengkap</span>
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ route('publications.index') }}"
                           class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-amber-400 bg-white px-4 py-2 text-xs font-semibold text-amber-900 hover:bg-amber-100 transition">
                            <span>Kelola Data Publikasi (CRUD)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================= -->
    <!-- 4. DAFTAR PUBLIKASI & RISET TERBARU (Snapshot Landing Page)       -->
    <!-- ================================================================= -->
    <section id="publikasi-terbaru" class="py-16 sm:py-24 border-b border-stone-200/80 bg-stone-50/40">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-10">
            <!-- Section Title + CTA to /publikasi -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div class="space-y-2 max-w-xl">
                    <span class="text-xs font-mono font-semibold uppercase tracking-wider text-amber-800">
                        03 &bull; Database &amp; Publikasi
                    </span>
                    <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
                        Publikasi Ilmiah Terkini
                    </h2>
                    <p class="text-sm text-stone-600">
                        Menampilkan 6 karya ilmiah terbaru yang dimuat dinamis dari database MySQL <code class="font-mono text-xs text-amber-900 bg-amber-100/70 px-1 py-0.5 rounded">publications</code>.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('publikasi') }}"
                       class="inline-flex items-center gap-1.5 rounded-xl border border-stone-300 bg-white px-4 py-2.5 text-xs font-semibold text-slate-800 hover:bg-stone-100 transition shadow-2xs">
                        <span>Lihat Semua ({{ $stats['total_publications'] }})</span>
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="{{ route('publications.create') }}"
                       class="inline-flex items-center gap-1.5 rounded-xl bg-amber-700 px-4 py-2.5 text-xs font-semibold text-white hover:bg-amber-800 transition shadow-2xs">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Tambah Publikasi</span>
                    </a>
                </div>
            </div>

            <!-- Publications Grid -->
            @if ($latestPublications->isEmpty())
                <div class="rounded-2xl border border-dashed border-stone-300 bg-white p-12 text-center">
                    <p class="text-sm text-stone-500">Belum ada data publikasi di database.</p>
                    <a href="{{ route('publications.create') }}" class="mt-3 inline-block text-xs font-semibold text-amber-800 underline">
                        Tambah data sekarang
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($latestPublications as $pub)
                        <x-publication-card :publication="$pub" />
                    @endforeach
                </div>
            @endif

            <!-- Bottom note -->
            <div class="flex items-center justify-between flex-wrap gap-3 pt-4 text-xs text-stone-500">
                <p>
                    Menampilkan {{ $latestPublications->count() }} dari total {{ $stats['total_publications'] }} publikasi terdaftar.
                </p>
                <a href="{{ route('publications.index') }}" class="font-semibold text-amber-800 hover:underline">
                    Buka Panel CRUD untuk Mengelola Seluruh Data &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- ================================================================= -->
    <!-- 5. KONTAK & INFORMASI INSTITUSI                                  -->
    <!-- ================================================================= -->
    <section id="kontak" class="py-16 sm:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-stone-200 bg-stone-50/70 p-8 sm:p-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <span class="text-xs font-mono font-semibold uppercase tracking-wider text-amber-800">
                            04 &bull; Hubungi &amp; Temukan
                        </span>
                        <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
                            Kontak &amp; Informasi Institusi
                        </h2>
                        <p class="text-sm text-stone-600 leading-relaxed max-w-xl">
                            Untuk keperluan bimbingan akademik, penelitian bersama, atau informasi program studi, silakan merujuk pada alamat kampus dan kanal resmi Fakultas Keguruan dan Ilmu Pendidikan Universitas Cokroaminoto Palopo.
                        </p>

                        <div class="space-y-3 pt-2 text-xs sm:text-sm text-stone-700">
                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-amber-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-slate-900">Alamat Kampus</p>
                                    <p class="text-stone-600">{{ $dosen['kontak']['alamat'] }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-amber-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-slate-900">Situs Web Fakultas &amp; Universitas</p>
                                    <div class="flex flex-wrap gap-2 pt-1 text-xs">
                                        <a href="{{ $dosen['kontak']['website_fkip'] }}" target="_blank" rel="noopener noreferrer" class="text-amber-800 underline hover:text-amber-950">fkip.uncp.ac.id</a>
                                        <span class="text-stone-300">&bull;</span>
                                        <a href="{{ $dosen['kontak']['website_uncp'] }}" target="_blank" rel="noopener noreferrer" class="text-amber-800 underline hover:text-amber-950">uncp.ac.id</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right col card: Direct CTA to CRUD -->
                    <div class="lg:col-span-5">
                        <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm space-y-4">
                            <h3 class="font-serif font-bold text-slate-900 text-base">Evaluasi Ujian Tengah Semester (UTS)</h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                Penguji dan mahasiswa dapat mencoba alur penambahan, pengubahan, dan penghapusan data publikasi secara langsung tanpa login.
                            </p>
                            <div class="pt-2">
                                <a href="{{ route('publications.index') }}"
                                   class="flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-3 text-xs font-semibold text-white shadow-sm hover:bg-amber-700 transition">
                                    <span>Buka Dashboard Kelola Publikasi</span>
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
