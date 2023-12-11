<?php

namespace Flyff\Modules\Post\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Post\Models\Category;

class CategoryRepository extends BaseRepository
{

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }
}