<?php

namespace App\Http\Middleware\Authentication;

use App\ExtraData\DefaultData;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Helpers\JwtDecoderHelper;
class SessionKeyChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionKeyToken = $request -> header('Session-Key');
        $current_url = $request -> path();
        if(empty($sessionKeyToken)){
            //No session
            $lower_current_url =strtolower($current_url);
            if(in_array($lower_current_url, DefaultData::$NO_SESSION_URLS)){

                return $next($request);
            }else{
                return response()->json(["message"=>"Session Key Token Not Found"],401);
            }
        }else{
            //With session
            try {
                //JWT Verification
                JWTAuth::setToken($sessionKeyToken);
                if (JWTAuth::getPayload()) {
                   // $userID=JwtDecoderHelper::decode($sessionKeyToken)['claims']['userID'];;
                    return $next($request);
                }else {
                    //JWT payload not found
                    return response()->json(['message' => 'USER NOT FOUND'], 401);
                }
                //return $next($request);
            } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['message' => 'TOKEN EXPIRED'], 401);
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['message' => 'TOKEN INVALID'], 401);
            } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['message' => 'TOKEN ABSENT'], 401);
            }
        }

    }
}
