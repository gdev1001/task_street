<?php

namespace App\Http\Middleware;

use Closure;

class Student
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

        if(!$request->user()->isStudent){

            if($request->user()->isCompany && !$request->ajax()){
                return redirect('client/manage');
            }

            if($request->user()->isExpertise && !$request->ajax()){
                return redirect('expertise');
            }
        }


        return $next($request);
    }
}
