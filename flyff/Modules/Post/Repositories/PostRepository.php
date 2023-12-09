<?php

namespace Flyff\Modules\Post\Repositories;

use Flyff\Core\Database\Models\Model;
use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Post\Models\Post;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository
{

    public function published(): Collection
    {
        return Post::published()->get();
    }
}