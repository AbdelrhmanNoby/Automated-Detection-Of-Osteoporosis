<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Authenticatable
{
    
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'age',
        'gender',
        'phone',
        'password',
        'user_id',
    ];

        public function report(){
        return $this->hasMany('App\Models\Report');
    }

       public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //   public function getAuthIdentifierName(){
    //     return 'id'; // Assuming 'id' is your primary key
    // }

    // public function getAuthIdentifier(){
    //     return $this->getKey();
    // }

    // public function getAuthPassword(){
    //     return $this->password;
    // }

    // // Optional: Implement RememberTokenInterface if you use remember tokens
    // public function getRememberToken(){
    //     return $this->remember_token;
    // }

    // public function setRememberToken($value){
    //     $this->remember_token = $value;
    // }

    // public function getRememberTokenName(){
    //     return "remember_token";
    //     }
}
