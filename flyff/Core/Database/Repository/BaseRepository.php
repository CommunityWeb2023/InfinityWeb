<?php

namespace Flyff\Core\Database\Repository;

use Flyff\Core\Database\Models\Model;

abstract class BaseRepository
{
    public function save(Model $model): Model
    {
        $model->save();
        return $model;
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }

}
