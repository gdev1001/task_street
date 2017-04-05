<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:19 AM
 */

namespace Shokse\Notice\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticePersistent extends Model {

    use SoftDeletes;

    protected $table = "notifications";

    protected $fillable = ['message', 'receiver_id', 'sender_id', 'status'];

    public function getMessageAttribute()
    {
        return htmlentities($this->attributes['message']);
    }

    public function scopeUnread($q)
    {
        return $q->where('status', 0);
    }
    
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

}