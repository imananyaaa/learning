<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class ModelAuthenticate extends Authenticatable
{

	protected $keyType = 'string';
    public $incrementing = false;


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
