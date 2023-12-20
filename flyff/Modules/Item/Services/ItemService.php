<?php

namespace Flyff\Modules\Item\Services;

use Flyff\Modules\Item\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Collection;

class ItemService
{

    public function __construct(
        private readonly ItemRepository $itemRepository
    ){}


    public function getAllItemsWithPaginate(int $paginate)
    {
        return $this->itemRepository->allWithPaginate($paginate);
    }

    public function searchItem(string $search)
    {
        return $this->itemRepository->searchItem($search);
    }


}