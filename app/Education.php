<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function src(){
    	return $this->belongsTo('idprofile\BasicInfo');
    }
}
