<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class user_model extends Model
{
	protected $table = 'users';

	public function Comment(){
		return $this->hasMany('App\Models\comment_model', 'idComment', 'id');
	}
}
