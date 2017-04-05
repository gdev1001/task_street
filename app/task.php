<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model {

    protected $table = "tasks" ;

    protected $match = 0;

    protected $fillable = ['name','project_id','description','skills', 'estimateTime','sequence', 'created_at'];

    /*
    * status:   0 // Normal
    *           1 // Request Pending
    *           2 // Accepted
    * completed:    0 // Incompleted
    *               1 // Completed
    * isCommitted:  0 // Normal
    *               1 // Result Committed
    */
    public function getMatch()
    {
        return $this->match;
    }
    
    public function setMatch($m)
    {
        $this->match = $m;
    }

    public function project()
    {
        return $this->belongsTo('App\project');
    }


    public function submission()
    {
        return $this->hasMany('App\submission');
    }

    public function user()
    {
        return $this->belongsToMany('App\User')->withTimestamps();

    }

    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }


    public function rank()
    {
        return $this->hasMany('App\rank');
    }

    public function skill()
    {
        return $this->belongsToMany('App\skill')->withTimestamps();
    }


    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }

    public function applied_students()
    {
        return $this->belongsToMany('App\Student')->join('tasks', 'tasks.id', '=', 'student_task.task_id')->where('tasks.status', '=', 1)->withTimestamps();
    }

    public function assigned_students(){
        return $this->belongsToMany('App\Student')->join('tasks', 'tasks.id', '=', 'student_task.task_id')->where('tasks.status', '=', 2)->withTimestamps();
    }

    public function taskUsers() {
        return $this->hasMany('App\TaskUser');
    }

    public function available(){
        if ($this->applied_students()->get()->count() >= 2 || $this->status == 2)
            return false;
        else
            return true;
    }

}
