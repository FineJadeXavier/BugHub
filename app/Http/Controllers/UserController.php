<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\EditPWDRequest;
use App\Http\Requests\EditEmailRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Article;
class UserController extends Controller
{
    /*
     * 登录
     */
    public function signin(SigninRequest $req)
    {
        //验证码验证
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return back()->withErrors(['验证码错误']);

        //从数据库获取用户信息
        $user = User::where('nickname',$req->nickname)->orWhere('email',$req->nickname)->first();

        //判断用户是否存在
        if (!$user)
            //用户昵称不存在，返回
            return back()->withErrors('用户不存在！');

        //验证密码是否正确
        if (!Hash::check($req->password, $user->password))
            //用户密码不存在，返回
            return back()->withErrors('密码错误！');

        //用户密码正确,保存用户id和昵称到session中
        session([
            'id' => $user->id,
            'nickname' => $user->nickname,
            'avatar' => $user->avatar,
            'email' => $user->email,
        ]);
        //登录跳转
        return redirect()->route('index');
    }

    /*
     *  注册
     *
     */
    public function signup(SignupRequest $req)
    {
        //验证码验证
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return back()->withErrors(['验证码错误']);
        //注册信息保存到数据库中
        $user = new User;
        $user->nickname = $req->nickname;
        $user->password = Hash::make($req->password);
        $user->avatar = "http://www.gravatar.com/avatar/" . rand(1, 99998) . "?s=100&d=monsterid";;
        $user->email = $req->email;
        $user->save();

        //保存用户id和昵称到session中
        session([
            'id' => $user->id,
            'nickname' => $user->nickname,
            'avatar' => $user->avatar,
            'email' => $user->email,
        ]);
        return redirect()->route('index');
    }

    /*
     *  编辑用户信息
     *
     */
    public function edit_pwd(EditPWDRequest $req)
    {
        //从数据库获取用户信息
        $user = User::where('id',session('id'))->first();

        //验证用户密码
        if (!Hash::check($req->password, $user->password))
            return back()->withErrors('密码错误！');

        //修改用户密码
        $user->password = Hash::make($req->password);

        $user->save();

        return back()->with("success",'修改成功！');
    }

    public function edit_email(EditEmailRequest $req)
    {
        //从数据库获取用户信息
        $user = User::where('id',session('id'))->first();

        //修改用户邮箱地址
        $user->email = $req->email;

        $user->save();

        //修改session中email信息
        session(['email' => $user->email]);

        return back()->with("success",'修改成功！');
    }


    /*
     * 个人中心
     *
     */
    function home(Request $req)
    {
        $user = User::where('nickname',$req->nickname)->first();
        if(!$user)
            return redirect()->route('index');
        $articles = Article::where('user_id',$user->id)->paginate(10);
        return view("user.home",['user'=>$user,"articles"=>$articles]);
    }

    //获取用户数量
    function api()
    {
        return User::all()->count();
    }


}
