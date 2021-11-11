<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $fillable = ['name','key_code','parent_id'];
    protected $table = "permissions";
    protected $primaryKey = 'id';

    public function permission(){
        return $this->hasMany(permission::class,'parent_id');
    }
}
