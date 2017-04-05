<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $table = 'interviews';

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function expertise()
    {
        return $this->belongsTo('App\Expertise');
    }    
}
