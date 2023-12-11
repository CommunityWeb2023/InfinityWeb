<?php

namespace Flyff\Modules\Post\Models;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\User\Models\BelongsToUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use BelongsToUser;
    use BelongsToCategory;

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

    protected $dates = [
        'published_at'
    ];

    protected $appends = [
        'image_path', 'content_without_html'
    ];

    protected static $globalScopes = [
        'published'
    ];


    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeOrderByPublishedAtDesc(Builder $query): void
    {
        $query->orderBy('published_at', 'desc');
    }

    public function getImagePathAttribute()
    {
        return Storage::url('post_image/' . $this->image);
    }

    public function getContentWithoutHtmlAttribute()
    {
        return strip_tags($this->content);
    }



}
