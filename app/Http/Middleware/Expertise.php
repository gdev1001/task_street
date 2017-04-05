<?php

namespace App\Http\Middleware;

use Closure;

class Expertise
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

        if(!$request->user()->isExpertise){


                if($request->user()->isCompany && !$request->ajax()){
                    return redirect('client/manage');
                }


                if($request->user()->isStudent && !$request->ajax()){
                    return redirect('profile');
                }

            }        

        return $next($request);
    }
}
