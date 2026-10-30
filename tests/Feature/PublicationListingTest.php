<?php

namespace Tests\Feature;

use App\Models\Publication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicationListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_publications_page_renders_successfully(): void
    {
        $response = $this->get(route('publikasi'));

        $response->assertOk();
        $response->assertViewIs('publications.public-index');
    }

    public function test_user_can_search_publications_by_title(): void
    {
        Publication::factory()->create([
            'title' => 'Rancang Bangun Sistem Informasi Khusus',
            'publisher' => 'Jurnal Alpha',
        ]);

        Publication::factory()->create([
            'title' => 'Analisis Kinerja Algoritma Klasifikasi',
            'publisher' => 'Jurnal Beta',
        ]);

        $response = $this->get(route('publikasi', ['q' => 'Sistem Informasi']));

        $response->assertOk();
        $response->assertSee('Rancang Bangun Sistem Informasi Khusus');
        $response->assertDontSee('Analisis Kinerja Algoritma Klasifikasi');
    }

    public function test_user_can_search_publications_by_publisher(): void
    {
        Publication::factory()->create([
            'title' => 'Judul Artikel Satu',
            'publisher' => 'Infotek Hamzanwadi',
        ]);

        Publication::factory()->create([
            'title' => 'Judul Artikel Dua',
            'publisher' => 'Ethical Lingua Journal',
        ]);

        $response = $this->get(route('publikasi', ['q' => 'Infotek']));

        $response->assertOk();
        $response->assertSee('Judul Artikel Satu');
        $response->assertDontSee('Judul Artikel Dua');
    }

    public function test_user_can_filter_publications_by_year(): void
    {
        Publication::factory()->create([
            'title' => 'Publikasi Tahun 2023',
            'year' => 2023,
        ]);

        Publication::factory()->create([
            'title' => 'Publikasi Tahun 2026',
            'year' => 2026,
        ]);

        $response = $this->get(route('publikasi', ['year' => 2023]));

        $response->assertOk();
        $response->assertSee('Publikasi Tahun 2023');
        $response->assertDontSee('Publikasi Tahun 2026');
    }

    public function test_user_can_sort_publications_by_citation_count(): void
    {
        $low = Publication::factory()->create([
            'title' => 'Artikel Sedikit Sitasi',
            'citation_count' => 1,
            'year' => 2026,
        ]);

        $high = Publication::factory()->create([
            'title' => 'Artikel Terbanyak Sitasi',
            'citation_count' => 99,
            'year' => 2022,
        ]);

        $response = $this->get(route('publikasi', ['sort' => 'citations']));

        $response->assertOk();
        $response->assertSeeInOrder([
            'Artikel Terbanyak Sitasi',
            'Artikel Sedikit Sitasi',
        ]);
    }

    public function test_publications_are_paginated(): void
    {
        Publication::factory()->count(15)->create();

        $response = $this->get(route('publikasi'));

        $response->assertOk();
        $response->assertViewHas('publications', function ($publications) {
            return $publications->perPage() === 9 && $publications->total() === 15;
        });
    }

    public function test_empty_state_shown_when_no_publications_match(): void
    {
        $response = $this->get(route('publikasi', ['q' => 'kata_kunci_mustahil_ada_12345']));

        $response->assertOk();
        $response->assertSee('Tidak ada publikasi yang cocok');
    }
}
