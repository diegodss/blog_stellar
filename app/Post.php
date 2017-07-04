<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = "posts";
    protected $primaryKey = "id";
    protected $fillable = [
        "user_id"
        , "active"
        , "title"
        , "body"
        , "published_at"
    ];

    public function scopeActive($query) {
        return $query->where('active', 1)->orderby('published_at', 'DESC');
    }

    public function scopeFreesearch($query, $value) {
        return $query->where('title', 'ilike', '%' . $value . '%');
    }

    public function user() {
        //return $this->HasOne('App\User', 'id', 'id_user');
        //return $this->hasOne('App\User');
        //return $this->belongsTo('App\User', 'id_user', 'id');
        return $this->belongsTo('App\User');
    }

}
