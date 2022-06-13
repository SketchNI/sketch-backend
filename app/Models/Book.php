<?php

namespace App\Models;

use App\Models\Book\BookGenre;
use App\Models\Book\Genre;
use Database\Factories\BookFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Book
 *
 * @property string $uuid
 * @property int $user_id
 * @property string $platform_uuid
 * @property string $genre_uuid
 * @property string $title
 * @property int $rating
 * @property string|null $review
 * @property int $book_id
 * @property string $image_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Genre|null $genre
 * @property-read Platform|null $platform
 * @method static BookFactory factory(...$parameters)
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
 * @method static Builder|Book whereBookId($value)
 * @method static Builder|Book whereCreatedAt($value)
 * @method static Builder|Book whereGenreUuid($value)
 * @method static Builder|Book whereImagePath($value)
 * @method static Builder|Book wherePlatformUuid($value)
 * @method static Builder|Book whereRating($value)
 * @method static Builder|Book whereReview($value)
 * @method static Builder|Book whereTitle($value)
 * @method static Builder|Book whereUpdatedAt($value)
 * @method static Builder|Book whereUserId($value)
 * @method static Builder|Book whereUuid($value)
 * @mixin Eloquent
 */
class Book extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Return the platform for this book.
     *
     * @return BelongsTo
     */
    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    /**
     * Return the author of this book.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Return the series for this book.
     *
     * @return BelongsTo
     */
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}
