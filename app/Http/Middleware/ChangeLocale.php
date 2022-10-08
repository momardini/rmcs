<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeLocale
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
        if (!Auth::guest()) {
            $user = Auth::user();
            app()->setLocale($user->locale ?? app()->getLocale());
            Carbon::setLocale(__('voyager::generic.is_rtl') == 'true' ? 'ar_SY' : config('app.locale') );
        }
        return $next($request);
    }
}
