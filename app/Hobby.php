<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function src(){
    	return $this->belongsTo('idprofile\BasicInfo');
    }
}
