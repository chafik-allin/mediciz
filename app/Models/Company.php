<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	use FindBySlug;

	public function admins()
	{
//		return $this->hasMany('')
	}
}
