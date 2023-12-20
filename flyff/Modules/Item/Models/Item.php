<?php

namespace Flyff\Modules\Item\Models;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Shop\Models\ShopItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    protected $connection = 'item';
    protected $table = 'ITEM_TBL';
    protected $primaryKey = 'Index';

    protected $hidden = [

    ];

    protected $appends = [
        'dwItemLV', 'image_path', 'is_in_shop'
    ];

    public function getDwItemLVAttribute()
    {
        if($this->attributes['dwItemLV'] === -1) {
            return 'No Item Level';
        } else {
            return $this->attributes['dwItemLV'];
        }
    }

    public function getImagePathAttribute()
    {
        if(Storage::exists('public/shop_items/' . Str::replace('dds', 'png', $this->attributes['szIcon']))) {
            return Storage::url('public/shop_items/' . Str::replace('dds', 'png', $this->attributes['szIcon']));
        } else {
            return Storage::url('public/shop_items/delete.png');
        }
    }

    public function getIsInShopAttribute()
    {
        return ShopItem::where('Index', $this->attributes['Index'])->exists();
    }

    public function toSearchableArray()
    {
        return [
            'Index' => (int) $this->Index,
            'szName' => $this->szName,
        ];
    }


    public function searchableAs(): string
    {
        return 'shop_items_index';
    }
}
