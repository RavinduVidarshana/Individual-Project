<?php

namespace App\Http\Middleware\Authentication;

use App\ExtraData\DefaultData;
use Closure;

class AppKeyChecker
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
        $appKeyToken = $request -> header('App-Key');

        if($appKeyToken == DefaultData::$DEFAULT_APP_KEY){
            return $next($request);

        }else{
            return response()->json(["message"=>"App Key Token Not Found"],401);
        }
    }
}
