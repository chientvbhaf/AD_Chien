<?php

namespace App\Http\Controllers\userController;

use App\Http\Controllers\Controller;
use App\model\progress_class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\model\requests;
use App\User;

class requestController extends Controller
{
    public $request ;
    public $user;
    public $progress_class;
    public $requests;
    public function __construct(requests $requests,User $user,progress_class $progress_class,requests $request)
    {
        $this->requests = $requests;
        $this->user = $user;
        $this->progress_class = $progress_class;
        $this->requests = $requests;
    }
    public function index(){

        $data_request = $this->requests->orderBy('created_at','DESC')->paginate(6);
        return view('admin.partials.component.requests.index',compact('data_request'));
    }
    public function store(Request $request){
        $arr = array(
            'title' => $request->title,
            'message' => $request->message,
            'class_id' => $request->id,
            'user_id' => Auth::user()->id
        );
        $this->requests->create($arr);
        $this->user->find(Auth::user()->id)->my_classes()->attach($request->id);
    }
    public function accept(Request $request){
        $accept = $this->progress_class->where('user_id',$request->user)->where('class_id',$request->class)->first();
        $accept->update(['status'=>1]);
        $this->requests->find($request->id)->delete();
    }
}
