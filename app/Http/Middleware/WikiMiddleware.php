<?php

namespace App\Http\Middleware;

use Closure;

class WikiMiddleware
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
        $currentID =$request->route()->name;
        $user = \Auth::user();

        if($user->isCompany){
            $id = \Auth::user()->company->project;
            if(!$id->contains('id',$currentID)) {
                return redirect ('client/manage');
            }
        }

        if($user->isStudent){
            $id = \Auth::user()->student->projects;
            if($id && !$id->contains('id',$currentID)) {
                return redirect ('/profile');
            }
        }
        return $next($request);
    }

}
