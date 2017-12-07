<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
    protected $fillable = ['question', 'course_id'];

    public function Answers()
    {
    	return $this->hasMany('App\Models\Qcm_answer');
    }

    public function Course()
    {
    	return $this->belongsTo('App\Models\Course');
    }
}
