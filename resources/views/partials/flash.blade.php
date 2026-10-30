@if (session('success'))
    <div x-data="{ show: true }" x-show="show" role="alert"
         class="mb-6 flex items-start justify-between gap-3 rounded-xl border border-emerald-200 bg-emerald-50/90 p-4 text-emerald-900 shadow-sm backdrop-blur">
        <div class="flex items-start gap-3">
            <svg class="h-5 w-5 shrink-0 text-emerald-600 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <div>
                <p class="font-medium text-sm text-emerald-950">{{ session('success') }}</p>
            </div>
        </div>
        <button type="button" @click="show = false" onclick="this.closest('[role=alert]').remove()"
                aria-label="Tutup notifikasi"
                class="text-emerald-700 hover:text-emerald-900 text-sm font-semibold p-1">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div role="alert"
         class="mb-6 flex items-start justify-between gap-3 rounded-xl border border-rose-200 bg-rose-50/90 p-4 text-rose-900 shadow-sm backdrop-blur">
        <div class="flex items-start gap-3">
            <svg class="h-5 w-5 shrink-0 text-rose-600 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12v-.008Z" />
            </svg>
            <div>
                <p class="font-medium text-sm text-rose-950">{{ session('error') }}</p>
            </div>
        </div>
        <button type="button" onclick="this.closest('[role=alert]').remove()"
                aria-label="Tutup notifikasi"
                class="text-rose-700 hover:text-rose-900 text-sm font-semibold p-1">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div role="alert"
         class="mb-6 rounded-xl border border-rose-200 bg-rose-50/90 p-4 text-rose-900 shadow-sm">
        <div class="flex items-center gap-2 mb-2">
            <svg class="h-5 w-5 shrink-0 text-rose-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <p class="font-semibold text-sm text-rose-950">Terdapat kesalahan pada formulir:</p>
        </div>
        <ul class="list-disc list-inside space-y-1 text-xs text-rose-800 ml-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
