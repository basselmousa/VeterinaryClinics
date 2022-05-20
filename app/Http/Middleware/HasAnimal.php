<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasAnimal
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
       if (auth()->user() != null){
//           dd(count(auth()->user()->animals));
           if (count(auth()->user()->animals) == 0) {
               return  redirect()->route('user.animals.index');
           }

           return $next($request);


       }
       return  redirect()->route('login');
    }
}
