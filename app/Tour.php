<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];
    public function scopeTour($query){
        return $query->where("status","tour")->orderBy('id','DESC');
    }
    public function scopeHotel($query){
        return $query->where("status","hotel")->orderBy('id','DESC');
    }
    public function scopeVillage($query){
        return $query->where("status","village")->orderBy('id','DESC');
    }
    public function scopeAgro($query){
        return $query->where("status","agro")->orderBy('id','DESC');
    }
}
