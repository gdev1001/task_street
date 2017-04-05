<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
