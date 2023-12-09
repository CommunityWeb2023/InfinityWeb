<?php

namespace Flyff\Modules\Post\Models;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\User\Models\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use BelongsToUser;

    protected $fillable = [
        'category_id',
        'title',
        'content',
        'user_id',
        'published_at',
        'image'
    ];

    protected $with = [
        'user', 'category'
    ];


    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'category');
    }

    protected $dates = [
        'published_at'
    ];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }


}
