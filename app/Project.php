<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    public function scopeCurrent($query){
        return $query->where("status","current")->orderBy('id','DESC');
    }
    public function scopeFinished($query){
        return $query->where("status","finished")->orderBy('id','DESC');
    }
}
