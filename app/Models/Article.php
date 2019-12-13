<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'postarticles';
    protected $fillable = ['title','summary','content','thumbnail'];
    
}
