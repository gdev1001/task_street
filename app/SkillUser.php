<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model {

	protected $table = "skill_user";

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function task()
    {
        return $this->belongsToMany('App\task');
    }
    
    public function skill()
    {
    	return $this->belongsTo('App\skill');
    }    

}