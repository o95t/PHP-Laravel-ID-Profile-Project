<?php

namespace idprofile;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    protected $table = 'basic_infos';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
    	return $this->belongsTo('idprofile\User');
    }

    public function skill(){
    	return $this->hasMany('idprofile\Skill');
    }

    public function exper(){
    	return $this->hasOne('idprofile\Experience');
    }

    public function hobby(){
    	return $this->hasMany('idprofile\Hobby');
    }

    public function social(){
    	return $this->hasMany('idprofile\Social');
    }

    public function file(){
    	return $this->hasOne('idprofile\Upload');
    }

    public function edu(){
        return $this->hasOne('idprofile\Education');
    }
}
