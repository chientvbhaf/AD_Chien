<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class progress_class extends Model
{
    protected $fillable = ['progress','progress','class_id','status'];
    protected $table = 'progress_classes';
    protected $primaryKey = 'id';
     public function user(){
         return $this->belongsTo(User::class,'user_id');
     }
     public function class(){
         return $this->belongsTo(tbl_class::class,'class_id');
     }
}
