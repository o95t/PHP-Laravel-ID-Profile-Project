<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function src(){
    	return $this->belongsTo('idprofile\BasicInfo');
    }
}
