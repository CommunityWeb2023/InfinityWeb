<?php

namespace Flyff\Modules\Post\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PostIndexResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'published_at' => Carbon::parse($this->published_at)->format('d/m/Y'),
            'category' => $this->category->name,
            'image' => $this->image,
            'content' => $this->content,
            'author' => $this->user->username,
            'author_image' => $this->user->profile_photo_url,
        ];
    }
}
