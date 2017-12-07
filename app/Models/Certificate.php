<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //

    public function Users()
    {
    	return $this->belongsToMany('App\User', 'user_certificate');
    }
}
