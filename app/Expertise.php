<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $table = 'expertise';
	protected $fillable= ['user_id'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

     public function project(){
        return $this->belongsToMany('App\project');
    }


}
