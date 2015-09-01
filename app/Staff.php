<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staff';
    
    /**
     * Get the post that owns the staff.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
    
    
    
}
