<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToeicAnswer extends Model
{
    protected $table = 'toeic_answer';
    protected $fillable = ['A', 'B', 'C', 'D', 'id_question'];

    public function toeicQuestionTow()
    {
        return $this->belongsTo('App\Models\ToeicQuestion', 'id_question', 'id');
    }
}
