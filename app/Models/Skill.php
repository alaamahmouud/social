<?php

namespace App\Models;
use App\Traits\GetAttribute;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

        protected $table = 'skills';
        public $timestamps = true;
        protected $fillable = array('name');
    
    
        public function scopeActive($query)
        {
    
            return $query->whereIsActive(1);
        }
    
    }
    
