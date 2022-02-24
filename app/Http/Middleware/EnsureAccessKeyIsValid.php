<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiUser;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class EnsureAccessKeyIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset($request->access_key)) {
            if ($access_key = ApiUser::where('token', $request->access_key)->first()) {
                $request['ability']=explode(',',$access_key->ability);
                return $next($request);
            }else {
                return ResponseFormatter::error([
                    'error'=>"Something went wrong",
                ],"Authentication Failed",500);
            }
        }else {
            return ResponseFormatter::error([
                'error'=>"Page Not Found",
            ],"Page Not Found",404);
        }
    }
}
