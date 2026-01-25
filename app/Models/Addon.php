<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    public function addon_category(){
        return $this->belongsTo(AddonCategory::class,"addcat_id");
    }
}
