<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\model\requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\model\tbl_class;

class homeController extends Controller
{
    public $user;
    public $class;
    public $requests;
    public function __construct(User $user, tbl_class $tbl_class,requests $requests)
    {
        $this->user = $user;
        $this->class = $tbl_class;
        $this->requests = $requests;
    }
    public function index(){
        /* if(Auth::check()){ */
            $user_count = $this->user->count();
            $class_count = $this->class->count();
            $request_count = $this->requests->count();
            return view('admin.partials.component.dashboard.index',compact('user_count','class_count','request_count'));
        /* }else{
            return redirect()->route('login.form');
        } */
    }
}
