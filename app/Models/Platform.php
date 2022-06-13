<?php

namespace App\Models;

use Database\Factories\Book\PlatformFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Book\Platform
 *
 * @property string $uuid
 * @property string $platform
 * @property int $enabled
 * @property-read Collection|Book[] $books
 * @property-read int|null $books_count
 * @method static PlatformFactory factory(...$parameters)
 * @method static Builder|Platform newModelQuery()
 * @method static Builder|Platform newQuery()
 * @method static Builder|Platform query()
 * @method static Builder|Platform whereEnabled($value)
 * @method static Builder|Platform wherePlatform($value)
 * @method static Builder|Platform whereUuid($value)
 * @mixin Eloquent
 */
class Platform extends Model
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
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'book_platforms';

    protected $withCount = ['books'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid', 'platform'
    ];

    /**
     * Return all books for a key.
     *
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
