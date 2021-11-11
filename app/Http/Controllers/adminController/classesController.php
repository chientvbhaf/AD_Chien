<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\model\role;
use Illuminate\Http\Request;
use App\model\tbl_class;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class classesController extends Controller
{
    public $class;
    public $user;
    public $role;
    public function __construct(tbl_class $tbl_class, User $user,role $role)
    {
        $this->class = $tbl_class;
        $this->user = $user;
        $this->role = $role;
    }
    public function index(){
        $data_class = $this->class->paginate(6);
        return view('admin.partials.component.classes.index',compact('data_class'));
    }
    public function create(){
        $data_user = $this->user->all();
        foreach ($data_user as $key => $user_item) {
            if($user_item->role()->count()){
                foreach ($user_item->role()->get() as $role_item) {
                    if($role_item->name == "lecturer"){
                        $data_lecturer[] = $user_item;
                    }
                }
                
            }
        } 
        return view('admin.partials.component.classes.create',compact('data_lecturer'));
    }
    public function store(Request $request){
        $arr = array(
          'clas_name' => $request->class_name,
          'clas_desc' => $request->class_desc,
          'clas_lecturer'=>$request->class_lecturer,
          'clas_slug' => $request->class_slug,
          'clas_status' => $request->class_status,
          'clas_post' => $request->class_post
        );

        if($request->hasFile('class_image')){
            $name_file = Str::random(20).'.'.$request->file('class_image')->extension();
            $image_path = $request->file('class_image')->storeAs('public/classes/image',$name_file);
            $arr['clas_image'] = Storage::url($image_path);
        }
        $this->class->create($arr);
        return redirect()->route('class.index');
    }
    public function edit_view(Request $request){
        $data_class = $this->class->find($request->id);
        return view('admin.partials.component.classes.edit_view',compact('data_class'));
    }
}
