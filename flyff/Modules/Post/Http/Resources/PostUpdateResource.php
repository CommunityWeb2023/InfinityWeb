<?php

namespace Flyff\Modules\Post\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PostUpdateResource extends JsonResource
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
            'published_at' => $this->published_at,
            'category' => $this->category,
            'image' => $this->image,
            'content' => $this->content,
            'image_path' => $this->image_path,
            'content_without_html' => $this->content_without_html,
        ];
    }
}
