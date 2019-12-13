<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToeicExam extends Model
{
    protected $table = 'toeic_exams';
    protected $fillable = ['title', 'status', 'description','thumbnail','audio'];

    public function toeicQuestion()
    {
        return $this->hasMany('App\Models\ToeicQuestion', 'toeic_exam_id', 'id');
    }
}
