<?php

namespace Tests\Feature;

use App\Models\Publication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicationValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_title_is_required(): void
    {
        $response = $this->post(route('publications.store'), [
            'title' => '',
            'publisher' => 'Jurnal Alpha',
            'year' => 2024,
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_title_must_be_at_least_five_characters(): void
    {
        $response = $this->post(route('publications.store'), [
            'title' => 'Abc',
            'publisher' => 'Jurnal Alpha',
            'year' => 2024,
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_publisher_is_required(): void
    {
        $response = $this->post(route('publications.store'), [
            'title' => 'Judul Penelitian Valid Panjang',
            'publisher' => '',
            'year' => 2024,
        ]);

        $response->assertSessionHasErrors(['publisher']);
    }

    public function test_year_is_required_and_must_be_numeric(): void
    {
        $response = $this->post(route('publications.store'), [
            'title' => 'Judul Penelitian Valid Panjang',
            'publisher' => 'Jurnal Alpha',
            'year' => 'bukan_angka',
        ]);

        $response->assertSessionHasErrors(['year']);
    }

    public function test_year_cannot_be_in_the_future(): void
    {
        $futureYear = ((int) date('Y')) + 5;

        $response = $this->post(route('publications.store'), [
            'title' => 'Judul Penelitian Valid Panjang',
            'publisher' => 'Jurnal Alpha',
            'year' => $futureYear,
        ]);

        $response->assertSessionHasErrors(['year']);
    }

    public function test_citation_count_cannot_be_negative(): void
    {
        $response = $this->post(route('publications.store'), [
            'title' => 'Judul Penelitian Valid Panjang',
            'publisher' => 'Jurnal Alpha',
            'year' => 2024,
            'citation_count' => -5,
        ]);

        $response->assertSessionHasErrors(['citation_count']);
    }

    public function test_url_must_be_valid_url_format(): void
    {
        $response = $this->post(route('publications.store'), [
            'title' => 'Judul Penelitian Valid Panjang',
            'publisher' => 'Jurnal Alpha',
            'year' => 2024,
            'url' => 'bukan-sebuah-url-valid',
        ]);

        $response->assertSessionHasErrors(['url']);
    }

    public function test_update_validates_same_rules(): void
    {
        $publication = Publication::factory()->create();

        $response = $this->put(route('publications.update', $publication), [
            'title' => '',
            'publisher' => '',
            'year' => 'salah',
        ]);

        $response->assertSessionHasErrors(['title', 'publisher', 'year']);
    }
}
