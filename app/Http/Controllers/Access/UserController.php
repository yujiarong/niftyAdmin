<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;
use DataTables;
use Validator;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    public function index(){
        return view('access.user.index');
    }

    public function tableGet(){
        $userList  = User::select('*')->with('roles');
        return DataTables::of($userList)
            ->editColumn('roles', function ($list) {
                return $list->roles->pluck('name')->toArray();
            })
            ->make(true);        
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            $errors = $validator->errors()->toArray();
            $errors = array_reduce($errors, function($carry, $item){ return $carry.$item[0].'<br>';  },'' );
            throw new InvalidRequestException($errors);
        }
        User::create($request->all());
        return ['code'=>200,'msg'=>'添加成功'];
    }

    public function edit($id){
        $user  = User::find($id);
        if(empty($user)){
            return redirect()->route('access.user.index')->withFlashWarning('此角色不存在');
        }
        $roles     = $user->roles->pluck('id')->toArray();
        $all_roles = Role::query()->get()->toArray();
        return view('access.user.edit',compact('user','roles','all_roles'));
    }

    public function delete(Request $request){
        $id   = $request->input('id');
        DB::transaction(function ()use($id) {
            $user = User::find($id);
            $user->roles()->detach();
            $user->delete();

        });
        return ['code'=>200,'msg'=>'删除成功']; 
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'    => 'required|max:255',
            'roles'   => 'required',
        ]);
        $name        = $request->input('name');
        $roles       = $request->input('roles');
        $id          = $request->input('id');
        try {
            $user    = User::find($id);
            $user->name  =  $name;
            $user->save();
    
            $user->roles()->sync($roles);
        }catch (\Exception $ex) {
            throw new InvalidRequestException($ex->getMessage());
        }
        return redirect()->route('access.user.index')->withFlashSuccess('操作成功');
    }
}
