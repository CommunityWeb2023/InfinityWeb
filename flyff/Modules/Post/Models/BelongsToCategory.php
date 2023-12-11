<?php

namespace Flyff\Modules\Post\Models;

use Flyff\Modules\Post\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToCategory
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'category');
    }

}