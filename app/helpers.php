<?php

	function getThumbnail($thumb)
	{
		$arr = explode('/',$thumb);
		$filename = array_pop($arr);
		array_push($arr, 'thumbs');
		array_push($arr, $filename);
		return implode('/', $arr);
	}