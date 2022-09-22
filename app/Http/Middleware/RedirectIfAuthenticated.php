<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $locale = session('locale') ? session('locale') : 'en';
        if (Auth::guard($guard)->check()) {
            $locale = auth()->user()->bahasa;
            App::setLocale($locale);

            return redirect('/');
        }

        return $next($request);
    }
}
