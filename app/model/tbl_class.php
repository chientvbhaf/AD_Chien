<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class tbl_class extends Model
{
    protected $fillable = ['clas_name','clas_desc','clas_image','clas_progress','clas_status','clas_lecturer','clas_slug','clas_post'];
    protected $table = "tbl_classes";
    protected $primaryKey = "id";
    public function lecturer(){
        return $this->belongsTo(User::class, 'clas_lecturer');
    }
    public function progress_class(){
        return $this->hasMany(progress_class::class,'class_id');
    }
    public function member(){
        return $this->belongsToMany(User::class,'progress_classes','class_id','user_id')->withPivot('progress','status');
    }
}
