<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IsDoctorHasCertifications
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
//        ddd(count(auth('doctor')->user()->certifications));
       if (auth('doctor')->user() != null){
           if (count(auth('doctor')->user()->certifications) == 0 or !auth('doctor')->user()->active){
               $message = count(auth('doctor')->user()->certifications) == 0 ? "Please Insert Some Certificates" : "Please Wait For Admin To Activate You";
               return redirect()->route('dashboard.doctor.certificates.index')->with("success" ,$message);
           }
           return $next($request);
       }
       return  redirect()->route('doctors.showLoginForm');
    }
}
