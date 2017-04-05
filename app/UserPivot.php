<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPivot extends Model
{
    protected $table = 'user_pivot';
	public $timestamps = false;

	protected $fillable = ['wiki_name', 'user_id', 'page_id', 'is_owner', 'is_viewer', 'is_editor'];

}
