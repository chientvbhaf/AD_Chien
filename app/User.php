<?php

namespace App;

use App\model\role;
use App\model\tbl_class;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','desc','DoB','account_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsToMany(role::class,'role_user','user_id','role_id');
    }
    /* function classes is get request , viet nham ^^ */
    public function classes(){
        return $this->belongsToMany(tbl_class::class,'requests','user_id','class_id');
    }
    public function my_classes(){
        return $this->belongsToMany(tbl_class::class,'progress_classes','user_id','class_id');
    }
}
