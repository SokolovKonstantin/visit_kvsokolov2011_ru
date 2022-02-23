<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Site_visit_statistics;

class Statistics
{
  private $routeCurrentUrl;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->routeCurrentUrl = url()->current();

        $statistics = Site_visit_statistics::where('name_of_page', $this->routeCurrentUrl)
        ->first();

        if (isset($statistics)) {
          $statistics->number_of_visits +=1;
          $statistics->save();
        } else {
          $statistics = new Site_visit_statistics;
          $statistics->number_of_visits = 1;
          $statistics->name_of_page = $this->routeCurrentUrl;
          $statistics->save();
        }

        return $next($request);
    }
}
