<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model {

    protected $table = "skills";
    
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function task()
    {
        return $this->belongsToMany('App\task');
    }
    public function skillUser()
    {
        return $this->hasMany('App\SkillUser');
    }
    public function project()
    {
	return $this->belongsToMany('App\project');
    }

}
