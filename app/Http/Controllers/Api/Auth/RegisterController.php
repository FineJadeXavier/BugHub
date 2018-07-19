<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller {
    use RegistersUsers;
    use Helpers;

    public function register(Request $req) {
        $rules = [
            'name' => 'required|unique:users|max:20|min:2',
            'email' => 'required|email|unique:users',
            "password"=>'required|max:32|min:6'
        ];

        $mes = [
            'name.required'    => '用户名不能为空',
            'name.unique'    => '用户名已被占用',
            'name.max'    => '用户名最多20位',
            'name.min'    => '用户名最少2位',
            'email.required'    => '邮箱地址不能为空',
            'email.email'    => '邮箱地址格式不正确',
            'email.unique'    => '邮箱地址已被占用',
            'password.required'    => '密码不能为空',
            'password.max'    => '密码最多32位',
            'password.min'    => '密码最少6位',
        ];
        $validator = Validator::make($req->all(), $rules, $mes);
        if($errors = $validator->errors()->first()){
            return [
                "errno"=>1,
                "errmsg"=>$errors
            ];
        };

        $user = $this->create($req->all());
        if ($user->save()) {
            $token = JWTAuth::fromUser($user);
            $user->remember_token = $token;
            $user->token_time = strtotime('+15days');
            $user->save();
            $user = User::where("id",$user->id)->first();
            return [
                "errno"=>0,
                "successmsg"=>"注册成功",
                "token"=>$token,
                "user"=>[
                    "id"=>$user->id,
                    "name"=>$user->name,
                    "avatar"=>$user->avatar,
                    "email"=>$user->email,
                    "vip"=>$user->vip,
                    "level"=>$user->level,
                    "sex"=>$user->sex,
                    "city"=>$user->city,
                    "credits"=>$user->credits,
                    "group_id"=>$user->group_id,
                    "authentication"=>$user->authentication,
                    "signature"=>$user->signature,
                    "created_at"=>$user->created_at->format('Y-m-d H:i:s')
                ]
            ];
        } else {
            return [
                "errno"=>1,
                "errmsg"=>"注册失败，请重试"
            ];
        }
    }

    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
        ]);
    }
}