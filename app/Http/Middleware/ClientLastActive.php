<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class ClientLastActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd("in middleware");
        if (auth('clients')->check())
        {
            if (auth('clients')->user()->last_active)
            {
                $getLastActive = Carbon::parse(auth('clients')->user()->last_active)->toDateString();
                if (!session()->has('last_active'))
                {
                    session()->put('last_active',$getLastActive);
                }
            }
            auth('clients')->user()->update([
                'last_active' => Carbon::now()->toDateTimeString()
            ]);

        }
        return $next($request);
    }
}
