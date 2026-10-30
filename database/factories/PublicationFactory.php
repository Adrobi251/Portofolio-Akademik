<?php

namespace Database\Factories;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Publication>
 */
class PublicationFactory extends Factory
{
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(8),
            'publisher' => fake()->randomElement([
                'Infotek: Jurnal Informatika dan Teknologi',
                'Ethical Lingua Journal',
                'Jurnal INSTEK',
                'Prosiding SEMANTIK',
                'Community Empowerment',
                'JUTINDA',
            ]),
            'year' => fake()->numberBetween(2017, (int) date('Y')),
            'citation_count' => fake()->numberBetween(0, 50),
            'url' => fake()->url(),
        ];
    }
}
