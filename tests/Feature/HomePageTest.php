<?php

namespace Tests\Feature;

use App\Models\Publication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
    }

    public function test_landing_page_displays_lecturer_identity(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Dr. Reski Pilu, S.Pd., M.Pd.');
        $response->assertSee('S1 PGSD / Pendidikan Bahasa Inggris');
        $response->assertSee('Fakultas Keguruan dan Ilmu Pendidikan (FKIP)');
        $response->assertSee('Universitas Cokroaminoto Palopo');
        $response->assertSee('English Language Teaching (ELT)');
        $response->assertSee('Flipped Learning');
    }

    public function test_landing_page_displays_three_academic_groups(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        // Kelompok 1: Pendidikan
        $response->assertSee('Pendidikan');
        $response->assertSee('Universitas Cokroaminoto Palopo (UNCP)');
        $response->assertSee('Universitas Negeri Makassar (UNM)');

        // Kelompok 2: Mata Kuliah
        $response->assertSee('Mata Kuliah');
        $response->assertSee('Bahasa Inggris Dasar (Basic English)');
        $response->assertSee('Pembelajaran Bahasa Inggris di SD');
        $response->assertSee('Media &amp; Teknologi Pembelajaran (E-Learning)', false);
        $response->assertSee('Metodologi Penelitian Pendidikan');

        // Kelompok 3: Publikasi & Riset
        $response->assertSee('Publikasi &amp; Riset', false);
    }

    public function test_landing_page_loads_latest_publications_from_database(): void
    {
        Publication::factory()->create([
            'title' => 'Karya Ilmiah Pertama Riset Web',
            'year' => 2026,
            'citation_count' => 12,
        ]);

        Publication::factory()->create([
            'title' => 'Karya Ilmiah Kedua Analisis Database',
            'year' => 2025,
            'citation_count' => 8,
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Karya Ilmiah Pertama Riset Web');
        $response->assertSee('Karya Ilmiah Kedua Analisis Database');
        $response->assertSee('12 sitasi');
        $response->assertSee('8 sitasi');
    }

    public function test_landing_page_limits_publications_to_six_items(): void
    {
        Publication::factory()->count(10)->create();

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertViewHas('latestPublications', function ($publications) {
            return $publications->count() === 6;
        });
    }

    public function test_landing_page_shows_action_ctas(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Lihat Publikasi');
        $response->assertSee('Kontak');
        $response->assertSee('Kelola Publikasi');
    }

    public function test_landing_page_executes_minimal_queries(): void
    {
        Publication::factory()->count(10)->create();

        DB::flushQueryLog();
        DB::enableQueryLog();

        $response = $this->get(route('home'));

        $response->assertOk();
        $queries = DB::getQueryLog();

        // 1 query for latest 6 publications, 1 query for aggregated stats (count & sum)
        $this->assertLessThanOrEqual(2, count($queries));
    }
}
