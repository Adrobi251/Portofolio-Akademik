@php
    $dosen = $dosen ?? config('dosen');
@endphp

<footer class="border-t border-stone-200 bg-stone-100 text-stone-600 mt-20">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Col 1: Bio ringkas -->
            <div class="md:col-span-2 space-y-3">
                <div class="flex items-center gap-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-900 text-stone-100 font-serif font-bold text-sm">
                        {{ $dosen['inisial'] ?? 'RP' }}
                    </span>
                    <span class="font-serif font-bold text-slate-900 text-base">
                        {{ $dosen['nama'] }}
                    </span>
                </div>
                <p class="text-xs text-stone-600 leading-relaxed max-w-md">
                    {{ $dosen['deskripsi'] }}
                </p>
                <div class="pt-2 text-[11px] text-stone-500 flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1 rounded bg-stone-200/80 px-2 py-0.5 font-mono text-[10px] text-stone-700">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                    </span>
                    <span class="inline-flex items-center gap-1 rounded bg-stone-200/80 px-2 py-0.5 font-mono text-[10px] text-stone-700">
                        PHP v{{ PHP_VERSION }}
                    </span>
                    <span class="inline-flex items-center gap-1 rounded bg-stone-200/80 px-2 py-0.5 font-mono text-[10px] text-stone-700">
                        Tailwind CSS v4
                    </span>
                </div>
            </div>

            <!-- Col 2: Navigasi Cepat -->
            <div>
                <h4 class="font-serif font-semibold text-slate-900 text-sm mb-3">Tautan Cepat</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('home') }}#hero" class="hover:text-slate-950 hover:underline">Beranda</a></li>
                    <li><a href="{{ route('home') }}#tentang" class="hover:text-slate-950 hover:underline">Tentang & Riset</a></li>
                    <li><a href="{{ route('home') }}#akademik" class="hover:text-slate-950 hover:underline">Informasi Akademik</a></li>
                    <li><a href="{{ route('publikasi') }}" class="hover:text-slate-950 hover:underline">Katalog Publikasi</a></li>
                    <li><a href="{{ route('publications.index') }}" class="hover:text-amber-800 hover:underline font-semibold text-slate-800">Area CRUD Publikasi</a></li>
                </ul>
            </div>

            <!-- Col 3: Kepatuhan Regulasi UTS -->
            <div>
                <h4 class="font-serif font-semibold text-slate-900 text-sm mb-3">Kepatuhan Regulasi UTS</h4>
                <p class="text-xs text-stone-600 leading-relaxed mb-3">
                    Aplikasi ini hanya menggunakan metadata akademik publik dari
                    <a href="{{ $dosen['sinta']['url'] }}" target="_blank" rel="noopener noreferrer" class="text-amber-800 underline hover:text-amber-900">SINTA ID {{ $dosen['sinta']['id'] }}</a>
                    dan <a href="{{ $dosen['google_scholar']['url'] }}" target="_blank" rel="noopener noreferrer" class="text-amber-800 underline hover:text-amber-900">Google Scholar</a>.
                    Tidak ada komunikasi privat untuk meminta data pribadi dosen.
                </p>
                <div class="rounded-lg border border-stone-200 bg-white/70 p-2.5 text-[11px] text-stone-500">
                    <span class="font-semibold text-slate-800">Target Evaluasi:</span> Mahasiswa, Akademisi, &amp; Penguji UTS WBF.
                </div>
            </div>
        </div>

        <div class="border-t border-stone-200/80 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-stone-500">
            <p>&copy; {{ date('Y') }} Profil Akademik Dosen &bull; {{ $dosen['prodi'] }}, {{ $dosen['universitas'] }}.</p>
            <p class="text-[11px]">Dibangun untuk Ujian Tengah Semester (UTS) Website Berbasis Framework.</p>
        </div>
    </div>
</footer>
