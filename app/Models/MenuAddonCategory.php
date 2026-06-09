<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAddonCategory extends Model
{
    public function addon_category()
    {
        return $this->belongsTo(AddonCategory::class,'addcat_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
