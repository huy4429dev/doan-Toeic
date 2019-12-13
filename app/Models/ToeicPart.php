<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToeicPart extends Model
{
    protected $table = 'toeic_parts';
    protected $fillable = ['title', 'thumbnail', 'description'];

    public function toeicQuestionTow()
    {
        return $this->hasMany('App\Models\ToeicQuestion', 'toeic_part_id', 'id');
    }
}