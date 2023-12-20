<?php

namespace Flyff\Modules\Shop\Services;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Shop\Models\ShopItem;
use Flyff\Modules\Shop\Repositories\ShopItemRepository;

class ShopItemService
{

    public function __construct(
        private readonly ShopItemRepository $shopItemRepository
    ){}

    public function getAllActiveItemsWithPaginate(int $paginate)
    {
        return $this->shopItemRepository->getAllActiveItemsWithPaginate($paginate);
    }

    public function create(array $data): Model|ShopItem
    {
        $shopItem = new ShopItem();
        $shopItem->fill($data);
        $this->shopItemRepository->save($shopItem);
        $shopItem->categories()->sync($data['categories']);
        return $shopItem;
    }

}