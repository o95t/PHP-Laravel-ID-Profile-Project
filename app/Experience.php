<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function src(){
    	return $this->belongsTo('idprofile\BasicInfo');
    }
}
