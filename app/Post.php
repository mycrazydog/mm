<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    protected $table = 'posts';
    
    //protected $dates = ['publish_date'];
    
	function getPublishDateAttribute($attr)
	{
	   if (!is_null($attr))
	   {
	    return date("m/d/Y", strtotime($attr));
	   }
	}
       
}
