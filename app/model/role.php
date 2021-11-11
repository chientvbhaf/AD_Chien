<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = ['name','desc','status'];
    protected $table = "tbl_roles";
    protected $primaryKey = 'id';

    public function permission(){
        return $this->belongsToMany(permission::class,'role_permission','role_id','permission_id');
    }
}
