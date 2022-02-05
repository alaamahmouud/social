<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';

    public $timestamps = true;
    
    protected $fillable = array(
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        );

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }


}

