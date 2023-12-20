<?php

namespace Flyff\Modules\Shop\Services;

use Flyff\Modules\Shop\Repositories\ShopCategoryRepository;

class ShopCategoryService
{

    public function __construct(
        private readonly ShopCategoryRepository $shopCategoryRepository
    ){}


    public function getAllActiveCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->shopCategoryRepository->getAllActiveCategories();
    }
}