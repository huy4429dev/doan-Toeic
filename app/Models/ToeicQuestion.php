<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToeicQuestion extends Model
{
    protected $table = 'toeic_questions';
    protected $fillable = ['content', 'thumbnail', 'toeic_part_id','toeic_exam_id','toeic_para_id','answer'];

    public function toeicExam(){
    	return $this->belongsTo('App\Models\ToeicExam', 'toeic_exam_id', 'id');
    }
    public function toeicPart(){
    	return $this->belongsTo('App\Models\ToeicPart', 'toeic_part_id', 'id');
    }
    public function toeicPara(){
    	return $this->belongsTo('App\Models\ToeicPara', 'toeic_para_id', 'id');
    }
    public function toeicAnswer(){
    	return $this->hasOne('App\Models\ToeicAnswer', 'id_question', 'id');
    }
}
