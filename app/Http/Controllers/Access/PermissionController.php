<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;
use DataTables;
use Validator;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use DB;

class PermissionController extends Controller
{
    public function index(){
        return view('access.permission.index');
    }

    public function tableGet(){
        $permissionClass = app(PermissionContract::class);
        $userList  = $permissionClass->select('*');
        return DataTables::of($userList)
                ->make(true);        
    }

    public function store(Request $request){
        $name = $request->get('name');
        if(empty($name)){
            throw new InvalidRequestException("permission name 不能为空");
        }
        try {
            $permissionClass = app(PermissionContract::class);

            $permission = $permissionClass::create(['name' => $name]);
        }catch (\Exception $ex) {
            throw new InvalidRequestException($ex->getMessage());
        }

        return ['code'=>200,'msg'=>'添加成功'];
    }

    public function update(Request $request){
        $name = $request->get('name');
        $id   = $request->get('id');
        try{
            $permissionClass = app(PermissionContract::class);
            $permissionClass->find($id)->update(['name'=>$name]);
        }catch (\Exception $ex) {
            throw new InvalidRequestException($ex->getMessage());
        }
        return ['code'=>200,'msg'=>'添加成功'];
    }

    public function delete(Request $request){
        $id   = $request->input('id');
        DB::transaction(function ()use($id) {
            $permission = app(PermissionContract::class)->find($id);
            $permission->roles()->detach();
            $permission->users()->detach();
            $permission->delete();

        });
        return ['code'=>200,'msg'=>'删除成功']; 
    }
    
}
