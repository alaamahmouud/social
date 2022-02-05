<?php

namespace App\Models;
use App\Traits\GetAttribute;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $table = 'categories';
        public $timestamps = true;
        protected $fillable = array('name', 'meta_keywords' , 'meta_des');
    
        public function videos()
        {
            return $this->hasMany('App\Models\Video');
        }
    
        public function scopeActive($query)
        {
    
            return $query->whereIsActive(1);
        }
    
    }
    
