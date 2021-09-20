<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    // Una categoria puo avere  tanti posts---Category One to Many Posts
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
