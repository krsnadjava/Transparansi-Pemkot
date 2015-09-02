<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    protected $hidden = ['created_at', 'updated_at'];

    public function danas() {
    	return $this->hasMany('App\Dana');
    }
}
