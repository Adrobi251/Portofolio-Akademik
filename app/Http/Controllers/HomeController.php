<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the lecturer profile landing page.
     */
    public function __invoke(): View
    {
        $dosen = config('dosen');

        $latestPublications = Publication::query()
            ->select(['id', 'title', 'publisher', 'year', 'citation_count', 'url'])
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        $aggregate = Publication::query()
            ->selectRaw('COUNT(*) as total_publications, COALESCE(SUM(citation_count), 0) as total_citations')
            ->first();

        $stats = [
            'total_publications' => (int) ($aggregate->total_publications ?? 0),
            'total_citations' => (int) ($aggregate->total_citations ?? 0),
            'h_index' => (int) ($dosen['sinta']['h_index'] ?? 0),
            'courses_count' => count($dosen['mata_kuliah'] ?? []),
        ];

        return view('home', compact('dosen', 'latestPublications', 'stats'));
    }
}
