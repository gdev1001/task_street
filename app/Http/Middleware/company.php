<?php

namespace App\Http\Middleware;

use Closure;

class company
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

        if(!$request->user()->isCompany){

            if($request->user()->isStudent && !$request->ajax()){
                return redirect('profile');
            }

            if($request->user()->isExpertise && !$request->ajax()){
                return redirect('expertise');
            }
        }    

        return $next($request);
    }
}
