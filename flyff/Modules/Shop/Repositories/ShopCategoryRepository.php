<?php

namespace Flyff\Modules\Shop\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Shop\Models\ShopCategory;

class ShopCategoryRepository extends BaseRepository
{
    public function getAllActiveCategories()
    {
        return ShopCategory::active()->get();
    }
}