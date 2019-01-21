<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Cache;
use Spatie\Permission\Models\Role;

class PermissionMiddleware
{
    protected $except = [
        'tableGet',//DataTable 接口
    ];
    protected $isAdmin = true; //为true的时候 admin值角色不需要配置权限

    public function handle($request, Closure $next)
    {
        $route = Route::currentRouteName();
        $user  = app('auth')->user();
        $roles = $user->roles;
        $permissions = $this->getPermission($user->id, $roles);
        if ( $this->isAdmin($roles) || $this->except($route) || in_array($route, $permissions) ) {
            return $next($request);
        }
        if($request->expectsJson()){
            return response()->json(['code'=>403,'msg'=>'您没有权限进行此操作']);
        }else{
            return redirect()->back()->withFlashWarning('您没有权限进行此操作');
        }
    }

    public function except($route){
        foreach ($this->except as $v) {
            if( false !==  strpos($route, $v)){
                return true;
            }
        }
        return false;
    }

    public function isAdmin($roles){
        return $this->isAdmin && in_array('admin', $roles->pluck('name')->toArray());
    }

    public function getPermission($id,$roles){
        $key         = "permissions_{$id}";
        $permissions = Cache::remember($key, 60, function () use($roles){
            $role_ids=  $roles->pluck('id')->toArray();
            $permissions = array_unique(array_reduce($role_ids, function ($result, $role_id) {
                $role   = Role::find($role_id);
                return array_merge($result, $role->permissions->pluck('name')->toArray());
            }, [] ) );
            return $permissions;
        });
        return $permissions ?? [];
    }
}
