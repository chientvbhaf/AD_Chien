<?php

namespace App\Http\Controllers\userController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\tbl_class;
use App\User;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public $class;
    public $user;
    public function __construct(tbl_class $tbl_class, User $user)
    {
        $this->class = $tbl_class;
        $this->user = $user;
        
    }
    public function index(){
        $class_newly = $this->class->where('clas_status',1)->orderBy('created_at','DESC')->paginate(8);
        $class_popular = $this->class->where('clas_status',1)->orderBy('clas_member','DESC')->paginate(8);
        return view('user.home.index',compact('class_newly','class_popular'));
    }
    public function my_class(){
        $user_id = Auth::user()->id;
        $data_class = $this->user->find($user_id)->my_classes()->get();
        return view('user.my_class.index',compact('data_class','user_id'));
    }
    public function single_class(){
        return view('user.my_class.single_class');
    }
}
