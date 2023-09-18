<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function src(){
    	return $this->belongsTo('idprofile\BasicInfo');
    }
}
