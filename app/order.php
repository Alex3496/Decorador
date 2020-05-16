<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //scopes

    public function scopedescription($query, $name)
    {
    	if($name){
    		return $query->where('description','LIKE',"%$name%");
    	}
    }

    public function scopedate($query,$date)
    {
    	if($date){
    		return $query->where('created_at','LIKE',"%$date%");
    	}
    }
}
