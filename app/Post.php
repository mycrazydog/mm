<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    protected $table = 'posts';
    
    //https://laracasts.com/discuss/channels/general-discussion/form-model-binding-date-carbon
    
	function getPublishDateAttribute($attr)
	{
	   if (!is_null($attr))
	   {
	    return date("m/d/Y", strtotime($attr));
	   }
	}
       
}
