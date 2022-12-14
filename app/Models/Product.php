<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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
    protected $hidden = [
        'username',
        'password',
    ];

    public function category()
    {
        return $this->belongsTo(Product::class);
    }
}
