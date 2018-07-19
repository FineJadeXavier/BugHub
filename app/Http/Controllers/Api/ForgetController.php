<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Cache;

class ForgetController extends Controller
{
    use AuthenticatesUsers;
    use Helpers;

    function email(Request $req)
    {
        //生成一个KEY
        if(!$user=User::where("email",strtolower($req->email))->first())
        {
            return [
                "errno"=>1,
                "errmsg"=>"邮箱地址不存在"
            ];
        }

        $key = md5(uniqid());

        $result = $this->send(strtolower($req->email),$key);

        if($result)
        {
            Cache::put('key', $key, 30);
            Cache::put('email', strtolower($user->email), 30);
            return [
                "errno"=>0,
                "successmsg"=>"邮件发送成功"
            ];
        }
        else
        {
           return [
                "errno"=>1,
                "errmsg"=>"邮件发送失败，请稍后再试"
            ];
        }
    }
    private function send($receive,$key)
    {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                              // Enable SMTP authentication
            $mail->Username = 'flyphp@163.com';                 // SMTP username
            $mail->CharSet = 'UTF-8';
            $mail->Password = 'codebuf9527';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->From = "flyphp@163.com";
            $mail->FromName = "DEBUG";
            $mail->addAddress($receive);     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'BUGUB|找回密码';
            $mail->Body    = "请在30分钟内点击<a href='http://bughub.2video.cn/forgot/{$key}'>超链接<a/>重置密码";
            $mail->send();
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }


        public function reset(Request $req)
        {

        //验证KEY和邮箱
        $key = Cache::get('key');
        $email = strtolower(Cache::get('email'));

        if(!$key)
        {
            return [
                "errno"=>1,
                "errmsg"=>"密钥失效，请重新发送邮件"
            ];
        }

        if($email != strtolower($req->email))
        {
            return [
                "errno"=>1,
                "errmsg"=>"邮箱地址不正确"
            ];
        }

        if($key!=$req->key)
        {
            return [
                "errno"=>1,
                "errmsg"=>"密钥不正确，请重试"
            ];
        }

        $user = User::where('email',strtolower($req->email))->first();
        $user->password = bcrypt($req->password);
        $user->save();
        Cache::forget('key');
        Cache::forget('email');
        return [
            "errno"=>0,
            "successmsg"=>"密码重置成功"
        ];
    }

}


