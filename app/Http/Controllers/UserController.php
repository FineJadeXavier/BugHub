<?php

namespace App\Http\Controllers;

use App\Models\User;
use Predis\Cluster\Hash;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\ResetPwdRequest;

class UserController extends Controller
{
    public function signin(SigninRequest $req)
    {
        //从数据库获取用户信息
        $user = User::where('nickname',$req->nickname)->first();

        //判断用户是否存在
        if ($user)
        {
            //验证密码是否正确
            if (Hash::check($req->password, $user->password))
            {
                //保存用户id和昵称到session中
                session([
                    'id' => $user->id,
                    'nickname' => $user->nickname,
                ]);

                //登录跳转
                return redirect()->route('index');
            }
            else
            {
                //用户密码不存在，返回
                return back()->withErrors('密码错误！');
            }
        }
        else
        {
            //用户昵称不存在，返回
            return back()->withErrors('昵称不存在！');
        }

    }

    public function signup(SignupRequest $req)
    {
        //注册信息保存到数据库中
        $user = new User;
        $user->fill([
            'nickname' => $req->nickname,
            'password' => Hash::make($req->password),
        ]);
        $user->save();
    }

    public function edit(EditRequest $req)
    {
        //从数据库获取用户信息
        $user = User::where('id',session('id'))->first();

        //修改用户信息
        $user->nickname = $req->nickname;

        $user->save();
    }

    public function resetpwd(ResetPwdRequest $req)
    {
        //从数据库获取用户信息
        $user = User::where('id',session('id'))->first();

        //修改用户密码
        $user->password = Hash::make($req->password);

        $user->save();
    }
}
