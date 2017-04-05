<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
	
    protected $table = 'company';
	
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function project()
    {
        return $this->hasMany('App\project');
    }

}
