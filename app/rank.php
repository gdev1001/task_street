<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class rank extends Model {

	protected $table = "rank";

	protected $fillable =['skills','overall_point'];


	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function tasks()
	{
		return $this->belongsTo('App\Task', 'task_id');
	}


	/**
	 * @param $id
	 * @return int
     */
	public function getRankAttribute()
	{
		return $this->where('overall_point', '>=', $this->overall_point)->count();
	}

	public function getTaskAttribute(){

		return $this->task_id;

	}


}
