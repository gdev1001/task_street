<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageLockPivot extends Model
{
	protected $table = 'page_lock_pivot';

	protected $fillable = ['user_id', 'page_id', 'lock'];
}
