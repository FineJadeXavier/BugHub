<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CrossHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $headers;
    private $allow_origin;

    public function handle($request, Closure $next)
    {
        $this->headers = [
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE,OPTIONS',
            'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers'),
            'Access-Control-Allow-Credentials' => 'true',//允许客户端发送cookie
            'Access-Control-Max-Age' => 1728000 //该字段可选，用来指定本次预检请求的有效期，在此期间，不用发出另一条预检请求。
        ];
        $this->allow_origin = [
            'http://www.czmooc.com',
            'http://localhost:8080',
            "http://bughub.2video.cn"
        ];
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        if (!in_array($origin, $this->allow_origin) && !empty($origin))
            return new Response('Forbidden', 403);
        //判断是否复杂请求(options)是就返回200，前台就可以获取到，继续执行请求
        if ($request->isMethod('options'))
            return $this->setCorsHeaders(new Response('OK', 200), $origin);
        $response =  $next($request);
        $methodVariable = array($response, 'header');
        //这个判断是因为在开启session全局中间件之后，频繁的报header方法不存在，所以加上这个判断，存在header方法时才进行header的设置
        if (is_callable($methodVariable, false, $callable_name)) {
            return $this->setCorsHeaders($response, $origin);
        }
        return $response;
    }
    /**
     * @param $response
     * @return mixed
     */
    public function setCorsHeaders($response, $origin)
    {
        foreach ($this->headers as $key => $value) {
            $response->header($key, $value);
        }
        if (in_array($origin, $this->allow_origin)) {
            $response->header('Access-Control-Allow-Origin', $origin);
        } else {
            $response->header('Access-Control-Allow-Origin', '');
        }
        return $response;
    }
}
