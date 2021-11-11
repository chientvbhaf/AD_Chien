<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\model\role;
use Illuminate\Http\Request;
use App\model\permission;
use App\User;

class roleController extends Controller
{
    public $role;
    public $permission;
    public $user;
    public function __construct(role $role, permission $permission , User $user)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->user = $user;
    }
    public function index(){
        $data_role = $this->role->paginate(6);
        return view('admin.partials.component.roles.index',compact('data_role'));
    }
    public function create(){
        $data_permission = $this->permission->where('parent_id',0)->get();
        return view('admin.partials.component.roles.create',compact('data_permission'));
    }
    public function store(Request $request){
        $arr = array(
            'id' => $request->role_id,
            'name' => $request->role_name,
            'desc' => $request->role_desc,
            'status' => $request->role_status
        );
        $role_new = $this->role->create($arr);
        $role_new->permission()->attach($request->role_permission);
        return redirect()->route('role.index');
    }
    public function assign_role(){
        $data_role = $this->role->all();
        $data_user = $this->user->paginate(6);
        return view('admin.partials.component.roles.assign_role',compact('data_user','data_role'));
    }
    public function assign_role_update(Request $request){
        $user = $this->user->find($request->id);
        $user->role()->sync($request->user_role);
        return redirect()->back();
    }
}
