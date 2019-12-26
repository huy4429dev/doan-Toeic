<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToeicPara extends Model
{
    protected $table = 'toeic_para';
    protected $fillable = ['title', 'content', 'toeic_part_id','toeic_exam_id'];
    public function toeicExam(){
        return $this->belongsTo('App\Models\ToeicExam','toeic_exam_id','id');
    }
    public function toeicPart(){
        return $this->belongsTo('App\Models\ToeicPart','toeic_part_id','id');
    }
    public function toeicQuestion(){
        return $this->hasMany('App\Models\ToeicQuestion','toeic_para_id','id');

    }
}
