@extends('layouts.admin')

@section('title', 'Ubah Publikasi - #' . $publication->id)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Breadcrumb & Header -->
    <div>
        <nav aria-label="Breadcrumb" class="text-xs text-stone-500 mb-1 flex items-center gap-1.5">
            <a href="{{ route('home') }}" class="underline hover:text-slate-900">Landing Page</a>
            <span aria-hidden="true">&rarr;</span>
            <a href="{{ route('publications.index') }}" class="underline hover:text-slate-900">Publikasi (CRUD)</a>
            <span aria-hidden="true">&rarr;</span>
            <span class="text-slate-900 font-semibold">Ubah #{{ $publication->id }}</span>
        </nav>
        <h2 class="font-serif font-bold text-slate-900 text-2xl sm:text-3xl leading-tight">
            Ubah Data Publikasi Ilmiah
        </h2>
        <p class="text-xs text-stone-600 mt-0.5">
            Formulir Update untuk merevisi record publikasi #{{ $publication->id }} di database.
        </p>
    </div>

    <!-- Form Card -->
    <div class="rounded-2xl border border-stone-200 bg-white p-6 sm:p-8 shadow-xs">
        <form method="POST" action="{{ route('publications.update', $publication) }}">
            @method('PUT')
            @include('admin.publications._form', [
                'publication' => $publication,
                'submitLabel' => 'Perbarui Publikasi'
            ])
        </form>
    </div>
</div>
@endsection
