<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use Carbon\Carbon;

class AuthController extends ApiController
{
    /**
     * 登录的接口
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if( !Auth::attempt($credentials) ){
            return $this->responseJson(401,'账号密码错误');
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $data  = [
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];
        return $this->responseJson(200, '登录成功',$data );

    }

    /**
     * 注销的接口
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->user()->token()->delete();
        return $this->responseJson(200, '退出成功' );
    }

    /**
     * 注册的接口
     *
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $name     = $request->input('name');
        $email    = $request->input('email');
        $password = $request->input('password');
        $user = new User();
        $user->name     = $name;
        $user->email    = $email;
        $user->password = bcrypt($password);
        $user->save();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $data  = [
                'access_token'  =>  $tokenResult->accessToken,
                'token_type'    => 'Bearer',
                'expires_at'    =>  Carbon::parse(
                                        $tokenResult->token->expires_at
                                    )->toDateTimeString(),
                'user'          => new UserResource($user)
        ];
        return $this->responseJson(200, '注册成功',$data );
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


}
