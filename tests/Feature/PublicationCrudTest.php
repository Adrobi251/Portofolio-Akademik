<?php

namespace Tests\Feature;

use App\Models\Publication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PublicationCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_management_index_page_can_be_rendered(): void
    {
        $publication = Publication::factory()->create([
            'title' => 'Artikel Uji Manajemen CRUD',
        ]);

        $response = $this->get(route('publications.index'));

        $response->assertOk();
        $response->assertViewIs('admin.publications.index');
        $response->assertSee('Artikel Uji Manajemen CRUD');
        $response->assertSee('Kelola Data Publikasi Ilmiah');
    }

    public function test_create_publication_form_can_be_rendered(): void
    {
        $response = $this->get(route('publications.create'));

        $response->assertOk();
        $response->assertViewIs('admin.publications.create');
        $response->assertSee('Tambah Data Publikasi Baru');
    }

    public function test_new_publication_can_be_stored(): void
    {
        $payload = [
            'title' => 'Penerapan Algoritma K-Means untuk Klasterisasi Data Kemahasiswaan',
            'publisher' => 'Jurnal Ilmiah Komputer UNCP',
            'year' => 2025,
            'citation_count' => 3,
            'url' => 'https://example.com/artikel-kmeans',
        ];

        $response = $this->post(route('publications.store'), $payload);

        $response->assertRedirect(route('publications.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('publications', [
            'title' => 'Penerapan Algoritma K-Means untuk Klasterisasi Data Kemahasiswaan',
            'publisher' => 'Jurnal Ilmiah Komputer UNCP',
            'year' => 2025,
            'citation_count' => 3,
            'url' => 'https://example.com/artikel-kmeans',
        ]);
    }

    public function test_publication_can_be_stored_without_optional_url(): void
    {
        $payload = [
            'title' => 'Publikasi Riset Tanpa Tautan Online Aktif',
            'publisher' => 'Prosiding Seminar Internal',
            'year' => 2024,
            'citation_count' => 0,
            'url' => null,
        ];

        $response = $this->post(route('publications.store'), $payload);

        $response->assertRedirect(route('publications.index'));
        $this->assertDatabaseHas('publications', [
            'title' => 'Publikasi Riset Tanpa Tautan Online Aktif',
            'url' => null,
        ]);
    }

    public function test_edit_publication_form_can_be_rendered(): void
    {
        $publication = Publication::factory()->create();

        $response = $this->get(route('publications.edit', $publication));

        $response->assertOk();
        $response->assertViewIs('admin.publications.edit');
        $response->assertSee($publication->title);
    }

    public function test_publication_can_be_updated(): void
    {
        $publication = Publication::factory()->create([
            'title' => 'Judul Awal Sebelum Direvisi',
            'year' => 2023,
        ]);

        $payload = [
            'title' => 'Judul Hasil Pembaruan dan Revisi Lengkap',
            'publisher' => 'Jurnal Terakreditasi SINTA 2',
            'year' => 2024,
            'citation_count' => 15,
            'url' => 'https://example.com/artikel-revisi',
        ];

        $response = $this->put(route('publications.update', $publication), $payload);

        $response->assertRedirect(route('publications.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('publications', [
            'id' => $publication->id,
            'title' => 'Judul Hasil Pembaruan dan Revisi Lengkap',
            'publisher' => 'Jurnal Terakreditasi SINTA 2',
            'year' => 2024,
            'citation_count' => 15,
        ]);

        $this->assertDatabaseMissing('publications', [
            'id' => $publication->id,
            'title' => 'Judul Awal Sebelum Direvisi',
        ]);
    }

    public function test_publication_can_be_deleted(): void
    {
        $publication = Publication::factory()->create([
            'title' => 'Artikel yang Akan Dihapus Dari Sistem',
        ]);

        $response = $this->delete(route('publications.destroy', $publication));

        $response->assertRedirect(route('publications.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('publications', [
            'id' => $publication->id,
        ]);
    }

    public function test_management_index_executes_efficient_queries(): void
    {
        Publication::factory()->count(15)->create();

        DB::flushQueryLog();
        DB::enableQueryLog();

        $response = $this->get(route('publications.index'));

        $response->assertOk();
        $queries = DB::getQueryLog();

        // 1 count for pagination, 1 fetch page items, 1 distinct years, 1 aggregate stats
        $this->assertLessThanOrEqual(4, count($queries));
    }
}
