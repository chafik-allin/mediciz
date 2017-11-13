<?php
namespace App\Models;

trait FindBySlug
{
	public function scopeSlug($query, $string) 
	{
  		return $query->where('slug', $string)->firstOrFail();
 	}

	public function getRouteKey()
	{
		return $this->slug;
	}

}