<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    use Helpers;

    public function login(Request $request) {

        if(!$user = User::where('email', strtolower($request->name))->orWhere('name', $request->name)->first()){
            return [
                "errno"=>1,
                "errmsg"=>"用户名或邮箱不存在",
            ];
        }
        if ($user && Hash::check($request->password, $user->password)) {
            $token = JWTAuth::fromUser($user);
            $arr_ip_header = array(
                'HTTP_CDN_SRC_IP',
                'HTTP_PROXY_CLIENT_IP',
                'HTTP_WL_PROXY_CLIENT_IP',
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWARDED_FOR',
                'REMOTE_ADDR',
            );
            $client_ip = 'unknown';
            foreach ($arr_ip_header as $key)
            {
                if (!empty($_SERVER[$key]) && strtolower($_SERVER[$key]) != 'unknown')
                {
                    $client_ip = $_SERVER[$key];
                    break;
                }
            }
            $user->remember_token = $token;
            $user->token_time = strtotime('+15days');
            $user->ip =$client_ip;
            $user->save();
            $user = User::where("id",$user->id)->first();
            return [
                "errno"=>0,
                "successmsg"=>"登录成功",
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
        }else{
            return [
                "errno"=>1,
                "errmsg"=>"密码错误"
            ];
        }
    }

    public function sendLoginResponse(Request $request, $token) {
        $this->clearLoginAttempts($request);
        return $this->authenticated($token);
    }

    public function authenticated($token) {
        return $this->response->array([
            'token' => $token,
            'status_code' => 200,
            'message' => 'User Authenticated',
        ]);
    }

    public function sendFailedLoginResponse() {
        throw new UnauthorizedHttpException("Bad Credentials");
    }

    public function logout() {
        $this->guard()->logout();
    }
}