<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'username',
        'password',
        'value_account',
        'bp_available',
        'price',
        'price_after_sale',
        'category_id',
        'linked_phone',
        'linked_email',
        'more',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'images'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'username',
        'password',
        'media',
    ];

    protected $casts = [
        'linked_phone' => 'boolean',
        'linked_email' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function images(): Attribute
    {
        $mediaItems = $this->getMedia('products');
        return Attribute::make(
            get: fn () => $mediaItems->map->only('original_url', 'file_name', 'order_column'),
        );
    }
}
