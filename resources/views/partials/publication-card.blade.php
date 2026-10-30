@props(['publication'])

<article class="group relative flex flex-col justify-between rounded-2xl border border-stone-200/90 bg-white p-6 shadow-sm hover:border-amber-400/80 hover:shadow-md transition">
    <div class="space-y-3">
        <!-- Top bar: Year + Citation Badge -->
        <div class="flex items-center justify-between text-xs">
            <span class="inline-flex items-center gap-1 rounded-md bg-stone-100 px-2.5 py-1 font-mono font-medium text-stone-700">
                <svg class="h-3.5 w-3.5 text-stone-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 9v7.5" />
                </svg>
                Tahun {{ $publication->year }}
            </span>

            @if ($publication->citation_count > 0)
                <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 border border-amber-200 px-2.5 py-0.5 text-xs font-semibold text-amber-800">
                    <svg class="h-3 w-3 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    {{ $publication->citation_count }} sitasi
                </span>
            @else
                <span class="text-[11px] text-stone-400">0 sitasi</span>
            @endif
        </div>

        <!-- Title -->
        <h3 class="font-serif font-bold text-slate-900 group-hover:text-amber-800 text-base sm:text-lg leading-snug line-clamp-3 transition">
            @if ($publication->url)
                <a href="{{ $publication->url }}" target="_blank" rel="noopener noreferrer" class="focus:outline-none focus-visible:underline">
                    {{ $publication->title }}
                </a>
            @else
                {{ $publication->title }}
            @endif
        </h3>

        <!-- Publisher / Venue -->
        <p class="text-xs text-stone-600 flex items-center gap-1.5">
            <svg class="h-4 w-4 shrink-0 text-stone-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <span class="line-clamp-1 italic">{{ $publication->publisher }}</span>
        </p>
    </div>

    <!-- Bottom link -->
    <div class="mt-4 pt-4 border-t border-stone-100 flex items-center justify-between text-xs">
        @if ($publication->url)
            <a href="{{ $publication->url }}" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-1 font-semibold text-amber-800 hover:text-amber-950 focus:outline-none focus-visible:underline">
                <span>Buka Artikel Ilmiah</span>
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
            </a>
        @else
            <span class="text-stone-400 italic">Tautan daring tidak tersedia</span>
        @endif

        <span class="text-[11px] font-mono text-stone-400">#{{ $publication->id }}</span>
    </div>
</article>
