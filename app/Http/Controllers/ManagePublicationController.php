<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Publication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagePublicationController extends Controller
{
    /**
     * Display the publications management table (CRUD Read).
     */
    public function index(Request $request): View
    {
        $search = $request->string('q')->trim()->toString();
        $year = $request->filled('year') ? (int) $request->input('year') : null;

        $publications = Publication::query()
            ->search($search)
            ->year($year)
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $availableYears = Publication::query()
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->all();

        $aggregate = Publication::query()
            ->selectRaw('COUNT(*) as total, COALESCE(SUM(citation_count), 0) as total_citations, COALESCE(AVG(citation_count), 0) as avg_citations')
            ->first();

        $stats = [
            'total' => (int) ($aggregate->total ?? 0),
            'total_citations' => (int) ($aggregate->total_citations ?? 0),
            'avg_citations' => round((float) ($aggregate->avg_citations ?? 0), 1),
        ];

        return view('admin.publications.index', compact(
            'publications',
            'availableYears',
            'search',
            'year',
            'stats'
        ));
    }

    /**
     * Show the form for creating a new publication (CRUD Create form).
     */
    public function create(): View
    {
        $publication = new Publication([
            'year' => (int) date('Y'),
            'citation_count' => 0,
        ]);

        return view('admin.publications.create', compact('publication'));
    }

    /**
     * Store a newly created publication in database (CRUD Create store).
     */
    public function store(StorePublicationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['citation_count'] = $validated['citation_count'] ?? 0;

        $publication = Publication::create($validated);

        return redirect()
            ->route('publications.index')
            ->with('success', "Publikasi \"{$publication->title}\" berhasil ditambahkan ke database.");
    }

    /**
     * Show the form for editing the specified publication (CRUD Update form).
     */
    public function edit(Publication $publication): View
    {
        return view('admin.publications.edit', compact('publication'));
    }

    /**
     * Update the specified publication in database (CRUD Update save).
     */
    public function update(UpdatePublicationRequest $request, Publication $publication): RedirectResponse
    {
        $validated = $request->validated();
        $validated['citation_count'] = $validated['citation_count'] ?? 0;

        $publication->update($validated);

        return redirect()
            ->route('publications.index')
            ->with('success', "Publikasi \"{$publication->title}\" berhasil diperbarui.");
    }

    /**
     * Remove the specified publication from database (CRUD Delete).
     */
    public function destroy(Publication $publication): RedirectResponse
    {
        $title = $publication->title;
        $publication->delete();

        return redirect()
            ->route('publications.index')
            ->with('success', "Publikasi \"{$title}\" berhasil dihapus dari database.");
    }
}
