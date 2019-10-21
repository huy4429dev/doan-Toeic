<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function topic(){
    	return $this->hasMany('App\Models\Topic', 'category_id', 'id');
    }
}
