<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    public function scopeGetmarked($query){
        return $query->where(['mark'=>1])->get();
    }
}
