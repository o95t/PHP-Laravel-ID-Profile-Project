<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'socials';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function src(){
    	return $this->belongsTo('idprofile\BasicInfo');
    }
}
