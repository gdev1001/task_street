<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitee extends Model
{
    protected $table = 'invitee';

    protected $fillable = ['email', 'invite_code', 'isRegistered'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
