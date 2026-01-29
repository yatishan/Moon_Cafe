<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAddon extends Model
{
    // Menu.php
    public function addons()
    {
        return $this->belongsToMany(Addon::class);
    }

    // Addon.php
    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
