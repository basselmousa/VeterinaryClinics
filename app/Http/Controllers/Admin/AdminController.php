<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    use ThrottlesLogins;

    public function showLoginForm()
    {

        return view('admin.login');
    }

    public function submitLoginForm(Request $request)
    {
        //

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

//        dd(Auth::guard('admin')->attempt(
//            $request->only($this->username(), 'password'), $request->filled('remember')
//        ));
        if (Auth::guard('admin')->attempt(
            $request->only($this->username(), 'password'), $request->filled('remember')
        )) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            $request->session()->regenerate();

            $this->limiter()->clear($this->throttleKey($request));
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->intended(route('admins.active'));
        }

        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);

    }

    public function username()
    {
        return 'email';
    }

    public function showActiveDoctors()
    {
        $doctors = Doctor::where("active", true)->paginate(20);
        //dd($doctors);
        return view("admin.doctors.active", compact("doctors"));
    }
    public function showPendingDoctors()
    {
        $doctors = Doctor::where("active", false)->paginate(20);
//        dd($doctors);
        return view("admin.doctors.pending", compact("doctors"));

    }

    public function activateDoctor(Request $request, Doctor $doctor)
    {
        $doctor->update([
            "active" => true
        ]);
        return redirect()->route("admins.pending");
    }
    public function deActivateDoctors(Request $request, Doctor $doctor)
    {
        $doctor->update([
            "active" => false
        ]);
        return back();
    }
    public function deleteDoctor(Request $request, Doctor $doctor)
    {
        $doctor->delete();
        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('admins.showLoginForm');
    }
}
