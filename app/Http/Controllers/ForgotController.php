<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetpwdRequest;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Cache;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
{
    /*
     *  找回密码
     *
     */
    public function forgot(ForgotRequest $req)
    {
        //生成一个KEY
        $key = mt_rand(100000,999999);

        $result = $this->send($req->email,$key);

        if($result)
        {
            Cache::put('key', $key, 10);
            return view('user.resetpwd',['email'=>$req->email]);
        }
        else
        {
            return back()->withErrors(['发送失败']);
        }
    }

    public function resetpwd_post(ResetpwdRequest $req){
        //验证KEY
        $key = Cache::get('key');

        if(!$key)
        {
            return redirect()->route('forgot')->withErrors(['KEY失效，请重新发送邮件']);
        }

        if($key!=$req->key)
        {
            return back()->withErrors(['KEY不正确，请重新输入']);
        }

        $user = User::where('email',$req->email)->first();
        $user->password = Hash::make($req->password);

        $user->save();

        Cache::forget('key');

        return redirect()->route('user.signin')->with("success",'重置密码成功');
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
            $mail->Subject = 'DEBUG|找回密码';
            $mail->Body    = '你的KEY：'.$key."       请在10分钟内重置密码，否则key将失效";

            $mail->send();

            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }
}
