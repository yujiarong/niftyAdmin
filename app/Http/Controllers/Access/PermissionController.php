<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;
use DataTables;
use Validator;
use Spatie\Permission\Contracts\Permission as PermissionContract;

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
            throw new InvalidRequestException("{$name} 已经存在");
        }
        try {
            $permissionClass = app(PermissionContract::class);

            $permission = $permissionClass::create(['name' => $name]);
        }catch (\Exception $ex) {
            throw new InvalidRequestException($ex->getMessage());
        }

        return ['code'=>200,'msg'=>'添加成功'];
    }

    
}
