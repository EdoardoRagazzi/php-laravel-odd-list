<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];
        //  Acuni post possono appartenere a una solo categoria per questo mettiamo la tabella al singolare, in questo caso Category

        // Singolare       One to Many         Posts = plurale
    public function category(){
            return $this->belongsTo('App\Category');
    }
     public function tags(){
                 return $this->belongsToMany('App\Tag');
    }
}
