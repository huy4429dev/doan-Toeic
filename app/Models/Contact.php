<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    protected $table = 'contact';
    protected $fillable = ['title','content','answer','student_id','view'];
    public function student(){
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }
}
