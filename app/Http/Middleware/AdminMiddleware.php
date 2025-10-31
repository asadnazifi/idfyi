<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                $user = Auth::guard('admin')->user() ?? Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('admin.login')->withErrors('دسترسی غیرمجاز.');
        }
        return $next($request);
    }
}
