<?php
namespace App\Http\Middleware;
use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
class GetUserFromToken
{
    public function handle($request, Closure $next)
    {
        $auth = JWTAuth::parseToken();
        if (! $token = $auth->setRequest($request)->getToken()) {
            return response()->json([
                'errno' => 1,
                'errmsg' => '没有获取到token'
            ]);
        }
        try {
            $user = $auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return response()->json([
                'errno' => 1,
                'errmsg' => 'token已过期'
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'errno' => 1,
                'errmsg' => 'token无效'
            ]);
        }
        if (! $user) {
            return response()->json([
                'errno' => 1,
                'errmsg' => 'token不存在'
            ]);
        }
//$this->events->fire('tymon.jwt.valid', $user);
        return $next($request);
    }
}
