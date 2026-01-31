<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAddonCategory extends Model
{
    // Menu.php
    public function addon_category()
    {
        return $this->belongsTo(AddonCategory::class,'addcat_id');
    }

    // Addon.php
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
