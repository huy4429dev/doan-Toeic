<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToeicHistory extends Model
{
    protected $table = "toeic_history";
    protected $fillable = ['result','toeic_exam_id','student_id']; 
    public function toeicExam()
    {
        return $this->belongsTo('App\Models\ToeicExam', 'toeic_exam_id', 'id');
    }
}
