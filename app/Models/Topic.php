<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = ['title','thumbnail','category_id','level'];

    public function category(){
    	return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function post(){
    	return $this->hasMany('App\Models\Post', 'topic_id', 'id');
    }
}
