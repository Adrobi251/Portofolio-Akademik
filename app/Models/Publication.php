<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $publisher
 * @property int $year
 * @property int $citation_count
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Publication extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'publisher',
        'year',
        'citation_count',
        'url',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'citation_count' => 'integer',
        ];
    }

    /**
     * Scope a query to search publications by title or publisher.
     *
     * @param  Builder<Publication>  $query
     * @return Builder<Publication>
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (blank($term)) {
            return $query;
        }

        return $query->where(function (Builder $subQuery) use ($term): void {
            $subQuery->where('title', 'like', "%{$term}%")
                ->orWhere('publisher', 'like', "%{$term}%");
        });
    }

    /**
     * Scope a query to filter by publication year.
     *
     * @param  Builder<Publication>  $query
     * @return Builder<Publication>
     */
    public function scopeYear(Builder $query, ?int $year): Builder
    {
        if (blank($year)) {
            return $query;
        }

        return $query->where('year', $year);
    }
}
