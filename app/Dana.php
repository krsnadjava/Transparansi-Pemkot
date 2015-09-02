<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    protected $table = 'dana';

    protected $hidden = ['created_at', 'updated_at'];

    public function children() {
    	return $this->hasMany('App\Dana','dana_id');
    }

    public function parent() {
    	return $this->belongsTo('App\Dana');
    }

    public function lembaga() {
    	return $this->belongsTo('App\Lembaga');
    }

    public function tags() {
    	return $this->belongsToMany('App\Tag');
    }
}
