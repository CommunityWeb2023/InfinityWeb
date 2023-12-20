<?php

namespace Flyff\Modules\Vote\Models;

use Flyff\Core\Database\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class VoteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site',
        'description',
        'url',
        'image',
        'active',
        'position',
        'votepoints'
    ];
}
