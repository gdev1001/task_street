<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertiseTask extends Model {
	
    protected $table = 'project_student';

    public function user()
    {
        return $this->belongsTo('App\task');
    }
    
    public function project()
    {
    	return $this->belongsTo('App\Expertise');
    }

}
