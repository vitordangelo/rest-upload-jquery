<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $hidden = ['password']; //Emite os dados desejados (nome da coluna)
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'city', 'state'];
    
}
