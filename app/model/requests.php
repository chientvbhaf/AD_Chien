<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    protected $fillable = ['title','message','class_id','user_id'];
    protected $table = 'requests';
    protected $primaryKey = 'id';
     public function user(){
         return $this->belongsTo(User::class,'user_id');
     }
     public function class(){
         return $this->belongsTo(tbl_class::class,'class_id');
     }
}
