<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['taggable_id', 'taggable_type', 'name'];
}
