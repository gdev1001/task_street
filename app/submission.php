<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class submission extends Model
{
    //

    protected $table = 'submission';

    public function project(){
        return $this->belongsTo('App\project');
    }

    public function task(){
        return $this->belongsTo('App\task');
    }

}
