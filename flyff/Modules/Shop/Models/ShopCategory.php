<?php

namespace Flyff\Modules\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Flyff\Core\Database\Models\Model;

class ShopCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'position',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
