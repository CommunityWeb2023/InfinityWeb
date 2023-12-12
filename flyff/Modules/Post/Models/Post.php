<?php

namespace Flyff\Modules\Post\Models;

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Flyff\Core\Database\Models\Model;
use Flyff\Modules\User\Models\BelongsToUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property string $published_at
 * @property string $image
 * @property string $speech_language
 * @property string $created_at
 * @property string $updated_at
 * @property string $image_path
 * @property string $content_without_html
 * @property string $time_to_read
 * @property User $user
 * @property Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|Post published()
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByPublishedAtDesc()
 */
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
        'image',
    ];

    protected $with = [
        'user', 'category'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $appends = [
        'image_path', 'content_without_html', 'time_to_read'
    ];


    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeOrderByPublishedAtDesc(Builder $query): void
    {
        $query->orderBy('published_at', 'desc');
    }

    public function getImagePathAttribute(): string
    {
        return Storage::url('post_image/' . $this->image);
    }

    public function getContentWithoutHtmlAttribute(): string
    {
        return strip_tags($this->content);
    }


    public function getTimeToReadAttribute(): string
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $wordsPerMinute = 225; // read about 200 words per minute
        $readTimeInMinutes = ceil($wordCount / $wordsPerMinute);
        return Carbon::now()->addMinutes($readTimeInMinutes)->diffForHumans(['parts' => 1, 'short' => true, 'syntax' => CarbonInterface::DIFF_ABSOLUTE]);
    }


}
