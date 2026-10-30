<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicationController extends Controller
{
    /**
     * Display a paginated listing of publications for students/public.
     */
    public function index(Request $request): View
    {
        $dosen = config('dosen');
        $search = $request->string('q')->trim()->toString();
        $year = $request->filled('year') ? (int) $request->input('year') : null;
        $sort = $request->input('sort', 'latest');

        $query = Publication::query()
            ->select(['id', 'title', 'publisher', 'year', 'citation_count', 'url'])
            ->search($search)
            ->year($year);

        match ($sort) {
            'oldest' => $query->orderBy('year')->orderBy('id'),
            'citations' => $query->orderByDesc('citation_count')->orderByDesc('year'),
            default => $query->orderByDesc('year')->orderByDesc('id'),
        };

        $publications = $query->paginate(9)->withQueryString();

        $availableYears = Publication::query()
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->all();

        return view('publications.public-index', compact(
            'dosen',
            'publications',
            'availableYears',
            'search',
            'year',
            'sort'
        ));
    }
}
