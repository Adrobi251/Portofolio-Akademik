@extends('layouts.app')

@section('title', 'Katalog Publikasi & Riset - ' . $dosen['nama'])
@section('meta_description', 'Daftar lengkap publikasi ilmiah, prosiding konferensi, dan artikel penelitian ' . $dosen['nama'] . ' - ' . $dosen['prodi'] . ' ' . $dosen['universitas'] . '.')

@section('content')
<section class="py-10 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Breadcrumb & Header -->
        <div class="space-y-3">
            <nav aria-label="Breadcrumb" class="text-xs text-stone-500 flex items-center gap-2">
                <a href="{{ route('home') }}" class="hover:text-slate-900 underline">Beranda</a>
                <span aria-hidden="true">&rarr;</span>
                <span class="text-slate-900 font-medium">Katalog Publikasi &amp; Riset</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-serif font-bold text-slate-900 text-3xl sm:text-4xl leading-tight">
                        Publikasi &amp; Karya Ilmiah
                    </h1>
                    <p class="text-sm text-stone-600 mt-1">
                        Koleksi artikel jurnal ilmiah dan prosiding konferensi oleh {{ $dosen['nama'] }}.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('publications.index') }}"
                       class="inline-flex items-center gap-1.5 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white hover:bg-amber-700 shadow-2xs transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                        </svg>
                        <span>Kelola / CRUD</span>
                        <span class="rounded bg-amber-400/20 px-1 py-0.5 text-[9px] font-mono text-amber-200">UTS</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="rounded-2xl border border-stone-200 bg-white p-4 sm:p-6 shadow-xs">
            <form method="GET" action="{{ route('publikasi') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-end">
                <!-- Search term (6 cols) -->
                <div class="lg:col-span-5 space-y-1">
                    <label for="search-input" class="text-xs font-semibold text-slate-800">Cari Judul / Penerbit</label>
                    <div class="relative">
                        <input type="text"
                               name="q"
                               id="search-input"
                               value="{{ $search }}"
                               placeholder="Contoh: ELT, Moodle, Flipped Learning..."
                               class="w-full rounded-xl border border-stone-300 bg-stone-50/50 px-3.5 py-2 pl-9 text-xs sm:text-sm text-slate-900 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500">
                        <svg class="pointer-events-none absolute left-3 top-2.5 h-4 w-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                </div>

                <!-- Year Filter (3 cols) -->
                <div class="lg:col-span-3 space-y-1">
                    <label for="year-select" class="text-xs font-semibold text-slate-800">Tahun Terbit</label>
                    <select name="year"
                            id="year-select"
                            class="w-full rounded-xl border border-stone-300 bg-stone-50/50 px-3 py-2 text-xs sm:text-sm text-slate-900 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500">
                        <option value="">Semua Tahun</option>
                        @foreach ($availableYears as $availYear)
                            <option value="{{ $availYear }}" {{ (string) $year === (string) $availYear ? 'selected' : '' }}>
                                {{ $availYear }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort (2 cols) -->
                <div class="lg:col-span-2 space-y-1">
                    <label for="sort-select" class="text-xs font-semibold text-slate-800">Urutkan</label>
                    <select name="sort"
                            id="sort-select"
                            class="w-full rounded-xl border border-stone-300 bg-stone-50/50 px-3 py-2 text-xs sm:text-sm text-slate-900 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500">
                        <option value="latest" {{ $sort === 'latest' ? 'selected' : '' }}>Tahun Terbaru</option>
                        <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Tahun Terlama</option>
                        <option value="citations" {{ $sort === 'citations' ? 'selected' : '' }}>Sitasi Terbanyak</option>
                    </select>
                </div>

                <!-- Buttons (2 cols) -->
                <div class="lg:col-span-2 flex items-center gap-2">
                    <button type="submit"
                            class="flex-1 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white shadow-2xs hover:bg-slate-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500">
                        Terapkan
                    </button>
                    @if ($search || $year || $sort !== 'latest')
                        <a href="{{ route('publikasi') }}"
                           title="Reset filter"
                           class="rounded-xl border border-stone-300 bg-stone-100 p-2.5 text-stone-600 hover:bg-stone-200">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Result count & active filters -->
        <div class="flex items-center justify-between text-xs text-stone-600 px-1">
            <p>
                Ditemukan <strong class="text-slate-900 font-semibold">{{ $publications->total() }}</strong> publikasi ilmiah
                @if ($search) untuk pencarian &ldquo;{{ $search }}&rdquo; @endif
                @if ($year) pada tahun <strong>{{ $year }}</strong> @endif
            </p>
            <p class="text-[11px] text-stone-400">
                Halaman {{ $publications->currentPage() }} dari {{ $publications->lastPage() }}
            </p>
        </div>

        <!-- Publications Grid -->
        @if ($publications->isEmpty())
            <div class="rounded-2xl border border-dashed border-stone-300 bg-white p-12 text-center space-y-3">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-stone-100 text-stone-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <h3 class="font-serif font-bold text-slate-900 text-base">Tidak ada publikasi yang cocok</h3>
                <p class="text-xs text-stone-500 max-w-md mx-auto">
                    Coba gunakan kata kunci lain atau hapus filter tahun untuk menampilkan seluruh karya ilmiah.
                </p>
                <div>
                    <a href="{{ route('publikasi') }}" class="inline-block text-xs font-semibold text-amber-800 underline">
                        Reset semua filter
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($publications as $pub)
                    <x-publication-card :publication="$pub" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pt-6">
                {{ $publications->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
