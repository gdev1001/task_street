<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\task')->withTimestamps();
    }

    public function projects(){
        return $this->belongsToMany('App\project')->withTimestamps();
    }

    public function applied_tasks(){
        return $this->belongsToMany('App\task')->whereIn('status', [1, 2])->where('completed', '=', 0)->withTimestamps();;
    }

    public function pending_tasks(){
        return $this->belongsToMany('App\task')->where('status', '=', 1)->where('completed', '=', 0)->withTimestamps();;
    }

    public function working_tasks(){
        return $this->belongsToMany('App\task')->where('status', '=', 2)->where('completed', '=', 0)->withTimestamps();;
    }

    public function committed_tasks(){
        return $this->belongsToMany('App\task')->where('status', '=', 2)->where('completed', '=', 1)->withTimestamps();;
    }

    public function completed_tasks(){
        return $this->belongsToMany('App\task')->where('completed', '>=', 1)->withTimestamps();;
    }

}
