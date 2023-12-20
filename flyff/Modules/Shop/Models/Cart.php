<?php

namespace Flyff\Modules\Shop\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Flyff\Core\Database\Models\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_item_id',
        'quantity',
    ];

    protected $with = [
        'shopItem',
    ];

    public function shopItem(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ShopItem::class, 'shop_item_id', 'id', 'shop_items')->without('categories');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }
}
