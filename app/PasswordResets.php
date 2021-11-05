<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    protected $table = 'password_resets';
    protected $fillable = ['email','token'];

    public function user(){
        return $this->hasOne(User::class,'email','email');
    }
}
