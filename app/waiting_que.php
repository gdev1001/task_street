<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class waiting_que extends Model
{
    
    protected $table = 'waiting_que';


    public function task(){

    	return $this->hasOne('App\task');

    }

    public function students(){
    	return $this->belongsToMany('App\Student');
    }

}
