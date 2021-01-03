<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'category_id', 'image', 'caption'];

    // /*
    // * Get the user that the post belongs to.
    // */
    // public function user(){

    //     return $this->belongsTo('\App\Models\User');
    // }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'tag_id');
    }

    public function comments() 
    {
        return $this->hasMany('App\Models\Comment');
    }

}
