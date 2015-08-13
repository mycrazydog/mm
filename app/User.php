<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends \Cartalyst\Sentinel\Users\EloquentUser implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = \Hash::make($value);
    // }
    
    

    /**
     * Returns the user Gravatar image url.
     *
     * @return string
     */
    public function getGravatarAttribute($value)
    {
        
        // Generate the Gravatar hash
        $gravatar = md5(strtolower(trim($value)));
       
        return "//gravatar.org/avatar/{$gravatar}?d=//charlotteresearch.info/assets/img/custom/sq_uncc_crown.jpg";
        
    }
    
    
    public function getFullNameAttribute($value)
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    
    
    

}
