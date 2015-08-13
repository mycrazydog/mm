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
	
	
	/**
	 * Return the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
	    return $this->belongsTo('App\User', 'user_id');
	    
	    //$user_id = $this->user_id;	    
	    //$user_email = User::findOrFail($user_id);    
	    //return $user_email;
	}
       
}
