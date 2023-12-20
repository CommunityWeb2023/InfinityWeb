<?php

namespace Flyff\Modules\Shop\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Shop\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartRepository extends BaseRepository
{


    public function getCart()
    {
        return Cart::where('user_id', Auth::id())->get();
    }
}