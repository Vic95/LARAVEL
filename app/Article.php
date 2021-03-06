<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Conner\Likeable\LikeableTrait;

    protected $fillable = ['title', 'content', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function commentaires() {
        return $this->hasMany('App\Commentaire');
    }
}