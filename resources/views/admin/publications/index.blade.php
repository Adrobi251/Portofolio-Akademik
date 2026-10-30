@extends('layouts.admin')

@section('title', 'Daftar Record Publikasi - Panel CRUD')

@section('content')
<div class="space-y-6">
    <!-- Header with Breadcrumb & Action button -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <nav aria-label="Breadcrumb" class="text-xs text-stone-500 mb-1 flex items-center gap-1.5">
                <a href="{{ route('home') }}" class="underline hover:text-slate-900">Landing Page</a>
                <span aria-hidden="true">&rarr;</span>
                <span class="text-slate-900 font-semibold">Publikasi (CRUD)</span>
            </nav>
            <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
                Kelola Data Publikasi Ilmiah
            </h2>
            <p class="text-xs text-stone-600 mt-0.5">
                Operasi Create, Read, Update, dan Delete untuk tabel database <code class="font-mono text-amber-900 bg-amber-100/70 px-1 py-0.5 rounded">publications</code>.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('publikasi') }}"
               class="rounded-xl border border-stone-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-700 hover:bg-stone-100 transition shadow-2xs">
                Lihat Tampilan Publik
            </a>
            <a href="{{ route('publications.create') }}"
               class="inline-flex items-center gap-1.5 rounded-xl bg-slate-900 px-4 py-2.5 text-xs font-semibold text-white hover:bg-amber-700 transition shadow-sm">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Tambah Publikasi Baru</span>
            </a>
        </div>
    </div>

    <!-- Stats Cards Strip -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-2xl border border-stone-200 bg-white p-4 shadow-2xs">
            <p class="text-xs text-stone-500">Total Publikasi Tersimpan</p>
            <p class="font-serif text-2xl font-bold text-slate-900 mt-1">{{ $stats['total'] }}</p>
            <p class="text-[11px] text-stone-400">Record di tabel publications</p>
        </div>
        <div class="rounded-2xl border border-stone-200 bg-white p-4 shadow-2xs">
            <p class="text-xs text-stone-500">Total Sitasi Keseluruhan</p>
            <p class="font-serif text-2xl font-bold text-amber-800 mt-1">{{ $stats['total_citations'] }}</p>
            <p class="text-[11px] text-stone-400">Sum citation_count</p>
        </div>
        <div class="rounded-2xl border border-stone-200 bg-white p-4 shadow-2xs">
            <p class="text-xs text-stone-500">Rata-rata Sitasi / Artikel</p>
            <p class="font-serif text-2xl font-bold text-slate-900 mt-1">{{ $stats['avg_citations'] }}</p>
            <p class="text-[11px] text-stone-400">Kutipan per publikasi</p>
        </div>
    </div>

    <!-- Filter & Search toolbar -->
    <div class="rounded-2xl border border-stone-200 bg-white p-4 shadow-2xs">
        <form method="GET" action="{{ route('publications.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <div class="sm:col-span-6 relative">
                <input type="text"
                       name="q"
                       value="{{ $search }}"
                       placeholder="Cari judul atau penerbit..."
                       class="w-full rounded-xl border border-stone-300 bg-stone-50/50 px-3.5 py-2 pl-9 text-xs sm:text-sm text-slate-900 placeholder-stone-400 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500">
                <svg class="pointer-events-none absolute left-3 top-2.5 h-4 w-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>

            <div class="sm:col-span-3">
                <select name="year"
                        class="w-full rounded-xl border border-stone-300 bg-stone-50/50 px-3 py-2 text-xs sm:text-sm text-slate-900 focus:border-amber-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-amber-500">
                    <option value="">Semua Tahun</option>
                    @foreach ($availableYears as $availYear)
                        <option value="{{ $availYear }}" {{ (string) $year === (string) $availYear ? 'selected' : '' }}>
                            Tahun {{ $availYear }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-3 flex items-center gap-2">
                <button type="submit"
                        class="flex-1 rounded-xl bg-slate-900 px-4 py-2 text-xs font-semibold text-white shadow-2xs hover:bg-slate-800">
                    Filter
                </button>
                @if ($search || $year)
                    <a href="{{ route('publications.index') }}"
                       title="Reset filter"
                       class="rounded-xl border border-stone-300 bg-stone-100 p-2 text-stone-600 hover:bg-stone-200">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table of publications (CRUD Read) -->
    <div class="rounded-2xl border border-stone-200 bg-white shadow-2xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm border-collapse">
                <thead class="border-b border-stone-200 bg-stone-50/80 text-[11px] font-mono uppercase tracking-wider text-stone-600">
                    <tr>
                        <th scope="col" class="py-3.5 px-4 w-12 text-center">ID</th>
                        <th scope="col" class="py-3.5 px-4">Judul &amp; Tautan</th>
                        <th scope="col" class="py-3.5 px-4 w-48">Penerbit / Jurnal</th>
                        <th scope="col" class="py-3.5 px-4 w-20 text-center">Tahun</th>
                        <th scope="col" class="py-3.5 px-4 w-24 text-center">Sitasi</th>
                        <th scope="col" class="py-3.5 px-4 w-36 text-center">Aksi (CRUD)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($publications as $pub)
                        <tr class="hover:bg-amber-50/30 transition">
                            <!-- ID -->
                            <td class="py-3.5 px-4 text-center font-mono text-stone-400 text-xs">
                                #{{ $pub->id }}
                            </td>

                            <!-- Title + URL -->
                            <td class="py-3.5 px-4">
                                <p class="font-serif font-bold text-slate-900 leading-snug">
                                    {{ $pub->title }}
                                </p>
                                @if ($pub->url)
                                    <a href="{{ $pub->url }}" target="_blank" rel="noopener noreferrer"
                                       class="inline-flex items-center gap-1 mt-1 text-[11px] text-amber-800 hover:underline">
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                        </svg>
                                        <span class="truncate max-w-xs sm:max-w-md">{{ $pub->url }}</span>
                                    </a>
                                @else
                                    <span class="text-[11px] text-stone-400 italic">Tanpa tautan</span>
                                @endif
                            </td>

                            <!-- Publisher -->
                            <td class="py-3.5 px-4 text-stone-600 text-xs">
                                {{ $pub->publisher }}
                            </td>

                            <!-- Year -->
                            <td class="py-3.5 px-4 text-center font-mono text-xs font-semibold text-slate-800">
                                {{ $pub->year }}
                            </td>

                            <!-- Citations -->
                            <td class="py-3.5 px-4 text-center">
                                @if ($pub->citation_count > 0)
                                    <span class="inline-flex items-center rounded-full bg-amber-50 border border-amber-200 px-2 py-0.5 text-xs font-semibold text-amber-800">
                                        {{ $pub->citation_count }}
                                    </span>
                                @else
                                    <span class="text-stone-300 font-mono text-xs">0</span>
                                @endif
                            </td>

                            <!-- Actions: Edit & Delete -->
                            <td class="py-3.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <!-- Edit -->
                                    <a href="{{ route('publications.edit', $pub) }}"
                                       title="Ubah publikasi"
                                       class="inline-flex items-center gap-1 rounded-lg border border-stone-200 bg-white px-2.5 py-1 text-xs font-medium text-slate-700 hover:bg-stone-100 hover:text-slate-900 transition shadow-2xs">
                                        <svg class="h-3.5 w-3.5 text-stone-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                        </svg>
                                        <span>Edit</span>
                                    </a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('publications.destroy', $pub) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus publikasi:\n\n&quot;{{ addslashes($pub->title) }}&quot;?\n\nTindakan ini langsung menghapus data dari database.');"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                title="Hapus publikasi"
                                                class="inline-flex items-center gap-1 rounded-lg border border-rose-200 bg-rose-50 px-2 py-1 text-xs font-medium text-rose-700 hover:bg-rose-100 transition shadow-2xs">
                                            <svg class="h-3.5 w-3.5 text-rose-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-4 text-center text-stone-500">
                                <div class="space-y-2">
                                    <p class="font-serif font-bold text-slate-800 text-base">Tidak ada data publikasi ditemukan</p>
                                    <p class="text-xs text-stone-500">Mulai menambahkan karya ilmiah dosen dengan menekan tombol Tambah Data.</p>
                                    <a href="{{ route('publications.create') }}" class="inline-block text-xs font-semibold text-amber-800 underline mt-2">
                                        + Tambah Publikasi Baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($publications->hasPages())
            <div class="border-t border-stone-200 px-4 py-3 bg-stone-50/50">
                {{ $publications->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
