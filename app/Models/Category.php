<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  	use \App\Models\FindBySlug;
  
  
    protected $fillable	=	['slug', 'name', 'description', 'user_id'];
}
