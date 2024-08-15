<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $user = Auth::user();

            if($request->is('login')) {
                $this->checkRoleAndRedirect($user);
            }

            if(! $user->is_admin && $request->is('admin/**')) {
                return to_route('/user/dashboard');
            }

            if($user->is_admin && $request->is('user/**')) {
                return to_route('/admin/dashboard');
            }
        }
        return $next($request);
    }

    public function checkRoleAndRedirect($user)
    {   
        if($user->is_admin) {
            return to_route('/admin/dashboard');
        } else {
            return to_route('/user/dashboard');
        }
    }
}
