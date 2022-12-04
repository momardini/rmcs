<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Menu extends Model
{
    protected $table = 'menus';
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Voyager::modelClass('MenuItem'));
    }

    public function parent_items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Voyager::modelClass('MenuItem'))
            ->whereNull('parent_id');
    }

    public static function getPortalMenu(){
        $menu = static::where('name', '=', 'portal')->first();
        return $menu->parent_items->sortBy('order');

    }
}
