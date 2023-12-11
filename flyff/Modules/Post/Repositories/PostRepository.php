<?php

namespace Flyff\Modules\Post\Repositories;

use Flyff\Core\Database\Models\Model;
use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Post\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository
{

    public function published(): Builder
    {
        return Post::published();
    }

    public function all(): Collection
    {
        return Post::all();
    }


    public function orderByPublishedAtDesc(): Builder
    {
        return Post::orderByPublishedAtDesc();
    }
}