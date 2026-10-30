@csrf

<div class="space-y-6">
    <!-- Judul Publikasi (title) -->
    <div>
        <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
            Judul Publikasi / Penelitian <span class="text-rose-500">*</span>
        </label>
        <p class="text-[11px] text-stone-500 mb-1.5">
            Judul lengkap artikel ilmiah, makalah konferensi, atau prosiding riset.
        </p>
        <textarea name="title"
                  id="title"
                  rows="3"
                  required
                  maxlength="255"
                  placeholder="Contoh: Rancang Bangun dan Evaluasi User Experience Sistem Short Link UNCP..."
                  class="w-full rounded-xl border {{ $errors->has('title') ? 'border-rose-400 bg-rose-50/40 ring-1 ring-rose-400' : 'border-stone-300 bg-white' }} px-3.5 py-2.5 text-sm text-slate-900 placeholder-stone-400 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">{{ old('title', $publication->title ?? '') }}</textarea>
        @error('title')
            <p class="mt-1 text-xs text-rose-600 flex items-center gap-1">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z" />
                </svg>
                <span>{{ $message }}</span>
            </p>
        @enderror
    </div>

    <!-- Publisher / Jurnal / Konferensi (publisher) -->
    <div>
        <label for="publisher" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
            Nama Jurnal / Konferensi / Penerbit <span class="text-rose-500">*</span>
        </label>
        <p class="text-[11px] text-stone-500 mb-1.5">
            Nama wadah terbit artikel, misalnya Infotek, Jurnal INSTEK, Prosiding SEMANTIK, dsb.
        </p>
        <input type="text"
               name="publisher"
               id="publisher"
               required
               maxlength="150"
               value="{{ old('publisher', $publication->publisher ?? '') }}"
               placeholder="Contoh: Infotek: Jurnal Informatika dan Teknologi"
               class="w-full rounded-xl border {{ $errors->has('publisher') ? 'border-rose-400 bg-rose-50/40 ring-1 ring-rose-400' : 'border-stone-300 bg-white' }} px-3.5 py-2.5 text-sm text-slate-900 placeholder-stone-400 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
        @error('publisher')
            <p class="mt-1 text-xs text-rose-600 flex items-center gap-1">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z" />
                </svg>
                <span>{{ $message }}</span>
            </p>
        @enderror
    </div>

    <!-- Grid: Tahun Terbit (year) & Jumlah Kutipan (citation_count) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="year" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                Tahun Terbit (year) <span class="text-rose-500">*</span>
            </label>
            <p class="text-[11px] text-stone-500 mb-1.5">
                Format 4 digit tahun (1980 – {{ date('Y') }}).
            </p>
            <input type="number"
                   name="year"
                   id="year"
                   required
                   min="1980"
                   max="{{ date('Y') }}"
                   value="{{ old('year', $publication->year ?? date('Y')) }}"
                   class="w-full rounded-xl border {{ $errors->has('year') ? 'border-rose-400 bg-rose-50/40 ring-1 ring-rose-400' : 'border-stone-300 bg-white' }} px-3.5 py-2.5 text-sm text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            @error('year')
                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="citation_count" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
                Jumlah Kutipan (citation_count)
            </label>
            <p class="text-[11px] text-stone-500 mb-1.5">
                Opsional, angka non-negatif. Default: 0.
            </p>
            <input type="number"
                   name="citation_count"
                   id="citation_count"
                   min="0"
                   value="{{ old('citation_count', $publication->citation_count ?? 0) }}"
                   class="w-full rounded-xl border {{ $errors->has('citation_count') ? 'border-rose-400 bg-rose-50/40 ring-1 ring-rose-400' : 'border-stone-300 bg-white' }} px-3.5 py-2.5 text-sm text-slate-900 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            @error('citation_count')
                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Tautan Artikel (url) -->
    <div>
        <label for="url" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">
            Tautan Artikel Ilmiah (url)
        </label>
        <p class="text-[11px] text-stone-500 mb-1.5">
            URL menuju artikel daring, DOI, atau Google Scholar (harus berupa URL valid dengan domain aktif).
        </p>
        <input type="url"
               name="url"
               id="url"
               maxlength="255"
               placeholder="https://doi.org/10.xxxx/... atau https://scholar.google.com/..."
               value="{{ old('url', $publication->url ?? '') }}"
               class="w-full rounded-xl border {{ $errors->has('url') ? 'border-rose-400 bg-rose-50/40 ring-1 ring-rose-400' : 'border-stone-300 bg-white' }} px-3.5 py-2.5 text-sm text-slate-900 placeholder-stone-400 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
        @error('url')
            <p class="mt-1 text-xs text-rose-600 flex items-center gap-1">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z" />
                </svg>
                <span>{{ $message }}</span>
            </p>
        @enderror
    </div>
</div>

<div class="mt-8 pt-6 border-t border-stone-200 flex items-center justify-end gap-3">
    <a href="{{ route('publications.index') }}"
       class="rounded-xl border border-stone-300 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-stone-100 transition">
        Batal
    </a>
    <button type="submit"
            class="inline-flex items-center gap-1.5 rounded-xl bg-slate-900 px-5 py-2.5 text-xs font-semibold text-white shadow-sm hover:bg-amber-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 transition">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
        </svg>
        <span>{{ $submitLabel ?? 'Simpan Publikasi' }}</span>
    </button>
</div>
