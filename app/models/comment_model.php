<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class comment_model extends Model
{
    protected $table = 'comments';

 	public function User(){
 		return $this->belongsTo('App\Models\user_model', 'idComment', 'id');
 	}

 	public function News(){
 		return $this->belongsTo('App\Models\news_model', 'idComment', 'id');
 	}
}
