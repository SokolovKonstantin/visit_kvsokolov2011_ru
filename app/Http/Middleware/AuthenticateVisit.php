<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //session 'authorized' true/false or unset

        if (!$request->session()->has('authorized')) {
          return redirect('/admin/authorization');
        }

        $authorized = $request->session()->get('authorized');
        if ($authorized !== true) {
          return redirect('/admin/authorization');
        } else {
          return $next($request);
        }

         return redirect('/');

    }
}
