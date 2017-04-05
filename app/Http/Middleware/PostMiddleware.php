<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class PostMiddleware
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
        if($projects = \Auth::user()->company->project->first() == null&& url('client/post')!= Request::url()){
            return redirect('client/post');
        }


        return $next($request);
    }
}
