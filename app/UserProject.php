<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model {
	
    protected $table = 'project_student';

    public function user()
    {
        return $this->belongsTo('App\Student');
    }
    
    public function project()
    {
    	return $this->belongsTo('App\project');
    }

}
