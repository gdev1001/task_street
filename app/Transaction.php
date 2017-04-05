<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function project()
    {
        return $this->belongsTo('App\project');
    }

    public function task()
    {
        return $this->belongsTo('App\task');
    }
    
}
