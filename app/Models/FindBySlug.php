<?php
namespace App\Models;

trait FindBySlug
{
	public function scopeSlug($query, $string) 
	{
  		return $query->where('slug', $string)->firstOrFail();
 	}

	public function setSlugAttribute($value)
    {
        $object = $this->where('slug','like',$value.'%')->get();
        if($object->count()>0)
            $this->attributes['slug'] =  $value."-".$object->count();
        else
            $this->attributes['slug'] = $value;
    }

	public function getRouteKey()
	{
		return $this->slug;
	}

}