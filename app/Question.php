<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	
    protected $table = 'project_question';

    public function projects()
    {
        return $this->belongsTo('App\project', 'project_id');
    }
    
    public function answers() {
    	return $this->hasMany('App\Answer', 'project_question_id');
    }

}
