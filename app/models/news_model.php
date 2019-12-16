<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class news_model extends Model
{
    protected $table = 'news';

    public function Category(){
    	 return $this->belongsTo('App\Models\category_model', 'idCategory ', 'id');
    }

    public function Comment(){
		return $this->hasMany('App\Models\comment_model', 'idComment', 'id');
	}
}
