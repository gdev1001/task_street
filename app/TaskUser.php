<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{

    protected $table = "task_user";

    public function skill()
    {
        return $this->belongsTo('App\skill');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}