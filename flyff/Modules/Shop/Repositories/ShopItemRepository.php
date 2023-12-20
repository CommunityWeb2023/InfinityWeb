<?php

namespace Flyff\Modules\Shop\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Shop\Models\ShopItem;

class ShopItemRepository extends BaseRepository
{
    public function getAllActiveItemsWithPaginate(int $paginate)
    {
        return ShopItem::active()->paginate($paginate);
    }
}