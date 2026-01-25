<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonCategory extends Model
{
    public function addons(){
        return $this->hasMany(Addon::class);
    }
}
