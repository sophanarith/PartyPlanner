<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/10/2019
 * Time: 1:32 AM
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next){
        if (Auth::user()->role != 'admin')
            return redirect('/login');
        else
            return $next($request);

    }
}