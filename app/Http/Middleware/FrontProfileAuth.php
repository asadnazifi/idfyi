<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FrontProfileAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            // فلش پیام و هدایت به صفحه ورود
            return redirect()->route('front.login')
                             ->with('warning', 'برای دسترسی به صفحه پروفایل باید وارد حساب شوید.');
        }
        return $next($request);
    }
}
