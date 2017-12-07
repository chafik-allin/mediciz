<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qcm_answer extends Model
{
    protected $fillable = ['content', 'is_correct','qcm_id'];
}
