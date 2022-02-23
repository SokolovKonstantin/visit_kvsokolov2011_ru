<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InitialInstallations
{
   public function handle(Request $request, Closure $next)
    {
    //  $request->session();
    if ( !$request->session()->has('language') ) {
        //Set language
        $request->session()->put('language', 'rus');
      }
    //language change
    if ($request->has('language')) {
        $request->session()->put('language', $request->language);
    }

      return $next($request);
    }
}
