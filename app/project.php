<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	
    protected $table = 'project';

    protected $fillable = ['type','name', 'Starttime', 'Endtime','skills','description','company_id','budget'];

    public function tasks()
    {
        return $this->hasMany('App\task');
    }

    public function skill()
    {
        return $this->belongsToMany('App\skill');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany('App\users');
    }

    public function expertise()
    {
        return $this->belongsToMany('App\Expertise');
    }

    public function submission(){
        return $this->hasMany('App\submission');
    }

    public function setStarttimeAttribute($date){
        $this->attributes['Start_time'] = Carbon::parse($date)->format('Y-m-d');
    }

    public function setEndtimeAttribute($date){
        $this->attributes['End_time'] = Carbon::parse($date)->format('Y-m-d');
    }

}
