<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title','thumbnail','content','topic_id','word_type','pronounce','use','audio'];
    public function topic(){
    	return $this->belongsTo('App\Models\Topic', 'topic_id', 'id');
    }
}
