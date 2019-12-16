<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class client_model extends Model
{
     protected $table = 'clients';

    public function Comment(){
    	 return $this->belongsTo('App\Models\comment_model', 'idComment ', 'id');
    }
}
