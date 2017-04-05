<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

	protected $table = "resume";

    protected $fillable = ['about','evaluation'];

    public function user()
    {
        $this->belongsTo('App\user');
    }

    public function skills(){
        $this->hasOne('App\skills');
    }
    public function rank(){
        $this->hasMany('App\ranks');
    }
}
