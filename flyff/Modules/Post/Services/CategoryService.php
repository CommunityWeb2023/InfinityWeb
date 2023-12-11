<?php

namespace Flyff\Modules\Post\Services;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Post\Models\Category;
use Flyff\Modules\Post\Repositories\CategoryRepository;

class CategoryService
{
    public function __construct(
        private readonly CategoryRepository $postCategoryRepository
    )
    {}

    public function getCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->postCategoryRepository->all();
    }

    public function create($data): Category|Model
    {
        $postCategory = new Category();
        $postCategory->fill($data);
        return $this->postCategoryRepository->save($postCategory);
    }
}