<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category_model extends Model
{
 	protected $table = 'categories';

 	public function News(){
 		return $this->hasMany('App\Models\news_model', 'idCategory', 'id');
 	}
}
