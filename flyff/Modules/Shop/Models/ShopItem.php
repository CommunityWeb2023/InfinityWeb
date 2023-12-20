<?php

namespace Flyff\Modules\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Flyff\Core\Database\Models\Model;

class ShopItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'index',
        'description',
        'donate_points',
        'vote_points',
        'image',
        'active',
        'amount',
        'tradable',
        'stackable',
    ];

    protected $casts = [
        'active' => 'boolean',
        'tradable' => 'boolean',
        'stackable' => 'boolean',
    ];

    protected $with = [
        'categories',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ShopCategory::class, 'shop_category_shop_item', 'shop_item_id', 'shop_category_id');
    }


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
