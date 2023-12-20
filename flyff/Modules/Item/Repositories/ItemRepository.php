<?php

namespace Flyff\Modules\Item\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Item\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemRepository extends BaseRepository
{

    public function allWithPaginate(int $paginate)
    {
        return Item::paginate($paginate);
    }

    public function searchItem(string $search): LengthAwarePaginator
    {
        return Item::search($search)->paginate(30);
    }
}