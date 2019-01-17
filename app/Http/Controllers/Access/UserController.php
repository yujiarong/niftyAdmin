<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;
use DataTables;
use Validator;

class UserController extends Controller
{
    public function index(){
        return view('access.user.index');
    }

    public function tableGet(){
        $userList  = User::select('*');
        return DataTables::of($userList)
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

    public function delete(Request $request){
        $id = $request->input('id');
        User::find($id)->delete();
        return ['code'=>200,'msg'=>'删除成功']; 
    }
}
