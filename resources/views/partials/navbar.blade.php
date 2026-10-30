@php
    $dosen = $dosen ?? config('dosen');
@endphp

<header class="sticky top-0 z-40 w-full border-b border-stone-200/80 bg-stone-50/90 backdrop-blur-md transition">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
        <!-- Brand / Identity -->
        <a href="{{ route('home') }}" class="group flex items-center gap-3 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 rounded-lg p-1">
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-stone-100 font-serif font-bold text-base shadow-sm group-hover:bg-amber-700 transition">
                {{ $dosen['inisial'] ?? 'RP' }}
            </span>
            <div class="flex flex-col">
                <span class="font-serif font-semibold text-slate-900 group-hover:text-amber-800 text-sm sm:text-base leading-tight transition">
                    {{ $dosen['nama_pendek'] ?? 'Reski Pilu' }}
                </span>
                <span class="text-[11px] text-stone-500 leading-tight">
                    {{ $dosen['prodi'] ?? 'S1 PGSD' }} &bull; {{ $dosen['fakultas'] ?? 'FKIP' }}
                </span>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <nav aria-label="Navigasi Utama" class="hidden md:flex items-center gap-1 lg:gap-2 text-sm font-medium text-slate-700">
            <a href="{{ route('home') }}#tentang" class="px-3 py-1.5 rounded-lg hover:text-slate-950 hover:bg-stone-200/60 transition">
                Tentang
            </a>
            <a href="{{ route('home') }}#akademik" class="px-3 py-1.5 rounded-lg hover:text-slate-950 hover:bg-stone-200/60 transition">
                Akademik
            </a>
            <a href="{{ route('publikasi') }}" class="px-3 py-1.5 rounded-lg hover:text-slate-950 hover:bg-stone-200/60 transition {{ request()->routeIs('publikasi') ? 'text-amber-800 bg-amber-100/70 font-semibold' : '' }}">
                Publikasi & Riset
            </a>
            <a href="{{ route('home') }}#kontak" class="px-3 py-1.5 rounded-lg hover:text-slate-950 hover:bg-stone-200/60 transition">
                Kontak
            </a>

            <div class="h-4 w-px bg-stone-300 mx-2" aria-hidden="true"></div>

            <a href="{{ route('publications.index') }}"
               class="inline-flex items-center gap-1.5 rounded-lg bg-slate-900 px-3.5 py-1.5 text-xs font-semibold text-stone-100 shadow-sm hover:bg-amber-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 transition">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
                <span>Kelola Publikasi</span>
                <span class="rounded bg-amber-400/20 px-1 py-0.5 text-[9px] font-mono uppercase text-amber-200">CRUD</span>
            </a>
        </nav>

        <!-- Mobile Menu Toggle Button -->
        <button type="button"
                id="mobile-menu-btn"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="mobile-menu"
                class="inline-flex md:hidden items-center justify-center rounded-lg p-2 text-slate-700 hover:bg-stone-200/60 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500">
            <svg id="icon-menu-open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg id="icon-menu-close" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Dropdown -->
    <nav id="mobile-menu" aria-label="Menu Mobile" class="hidden md:hidden border-t border-stone-200 bg-stone-50 px-4 pt-2 pb-4 space-y-1 text-sm font-medium">
        <a href="{{ route('home') }}#tentang" class="block rounded-lg px-3 py-2 text-slate-700 hover:bg-stone-200/60">Tentang</a>
        <a href="{{ route('home') }}#akademik" class="block rounded-lg px-3 py-2 text-slate-700 hover:bg-stone-200/60">Informasi Akademik</a>
        <a href="{{ route('publikasi') }}" class="block rounded-lg px-3 py-2 text-slate-700 hover:bg-stone-200/60">Katalog Publikasi</a>
        <a href="{{ route('home') }}#kontak" class="block rounded-lg px-3 py-2 text-slate-700 hover:bg-stone-200/60">Kontak</a>
        <div class="pt-2">
            <a href="{{ route('publications.index') }}" class="flex items-center justify-between rounded-lg bg-slate-900 px-3 py-2 text-stone-100 font-semibold">
                <span>Kelola Publikasi (CRUD)</span>
                <span class="rounded bg-amber-400/30 px-1.5 py-0.5 text-[10px] font-mono text-amber-200">UTS</span>
            </a>
        </div>
    </nav>
</header>

<script>
    (function() {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('icon-menu-open');
        const closeIcon = document.getElementById('icon-menu-close');
        if (btn && menu) {
            btn.addEventListener('click', function() {
                const isExpanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', !isExpanded);
                menu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    })();
</script>
