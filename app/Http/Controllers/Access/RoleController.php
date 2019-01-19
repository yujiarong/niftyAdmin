<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;
use DataTables;
use Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    public function index(){
        return view('access.role.index');
    }

    public function tableGet(){
        $userList  = Role::select('*');
        return DataTables::of($userList)
                ->make(true);        
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'         => 'required|max:255',
            'permissions'   => 'required',
        ]);
        $name        = $request->input('name');
        $permissions = $request->input('permissions');
        $id          = $request->input('id');
        try {
            if(!empty($id)){
                $role  = Role::find($id);
                $role->name  =  $name;
                $role->save();
            }else{
                $role = Role::create(['name' => $name]);
            }
            $role->permissions()->sync($permissions);
        }catch (\Exception $ex) {
            throw new InvalidRequestException($ex->getMessage());
        }
        return redirect()->route('access.role.index')->withFlashSuccess('操作成功');
    }

    public function create(Request $request){
        $permissions = Permission::query()->get()->sortBy('name')->toArray();
        return view('access.role.create',compact('permissions'));
    }

    public function edit($id){
        $role  = Role::find($id);
        if(empty($role)){
            return redirect()->route('access.role.index')->withFlashWarning('此角色不存在');
        }
        $permissions     = $role->permissions->pluck('id')->toArray();
        $all_permissions = Permission::query()->get()->sortBy('name')->toArray();
        return view('access.role.edit',compact('role','permissions','all_permissions'));
    }

    public function delete(Request $request){
        $id = $request->input('id');
        DB::transaction(function ()use($id) {
            $role = Role::find($id);
            $role->users()->detach();//删除用户关联
            $role->permissions()->detach();//删除权限关联
            $role->delete();
        });
        return ['code'=>200,'msg'=>'删除成功']; 
    }

}
