<?php

namespace Flyff\Modules\Post\Models;

use Flyff\Core\Database\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bgColor',
        'textColor',
    ];
}
