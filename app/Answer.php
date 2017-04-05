<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	
    protected $table = 'project_answer';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
	
    public function project_question()
    {
    	return $this->belongsTo('App\Question', 'project_question_id');
    }
}
