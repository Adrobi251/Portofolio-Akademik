@extends('layouts.admin')

@section('title', 'Tambah Publikasi Baru - Panel CRUD')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Breadcrumb & Header -->
    <div>
        <nav aria-label="Breadcrumb" class="text-xs text-stone-500 mb-1 flex items-center gap-1.5">
            <a href="{{ route('home') }}" class="underline hover:text-slate-900">Landing Page</a>
            <span aria-hidden="true">&rarr;</span>
            <a href="{{ route('publications.index') }}" class="underline hover:text-slate-900">Publikasi (CRUD)</a>
            <span aria-hidden="true">&rarr;</span>
            <span class="text-slate-900 font-semibold">Tambah Baru</span>
        </nav>
        <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
            Tambah Data Publikasi Baru
        </h2>
        <p class="text-xs text-stone-600 mt-0.5">
            Formulir Create data publikasi terhubung langsung ke tabel <code class="font-mono text-amber-900 bg-amber-100/70 px-1 py-0.5 rounded">publications</code> via Eloquent ORM.
        </p>
    </div>

    <!-- Form Card -->
    <div class="rounded-2xl border border-stone-200 bg-white p-6 sm:p-8 shadow-xs">
        <form method="POST" action="{{ route('publications.store') }}">
            @include('admin.publications._form', [
                'publication' => $publication,
                'submitLabel' => 'Simpan Publikasi Baru'
            ])
        </form>
    </div>
</div>
@endsection
