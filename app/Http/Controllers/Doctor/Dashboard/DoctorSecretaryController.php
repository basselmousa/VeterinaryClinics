<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Secretary;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DoctorSecretaryController extends Controller
{
    use ThrottlesLogins;
    //
    public function showLoginForm()
    {
        return view('secretary.auth.login');
    }
    public function submitLoginForm(Request $request)
    {
        //

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::guard('secretary')->attempt(
            $request->only($this->username(), 'password'), $request->filled('remember')
        )) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            $request->session()->regenerate();

            $this->limiter()->clear($this->throttleKey($request));
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->intended(route('secretary.appointments.doctor-clinic'));
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
    public function index()
    {
        $secretaries = auth("doctor")->user()->secretary;
        return view("doctor.secretary.index", compact("secretaries"));
    }

    public function create(Request $request)
    {
//        dd($request);
        $request->validate([
            "full_name" => "required",
            "email" => "required|unique:secretaries,email",
            "password" => "required",
            "phone_number" => "required|unique:secretaries,phone_number"
        ]);
        auth("doctor")->user()->secretary()->create([
            "full_name" => $request->full_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone_number" => $request->phone_number,
        ]);
        return redirect()->route("dashboard.doctor.secretary.index");
    }

    public function update(Request $request, Secretary $secretary)
    {
        $request->validate([
            "full_name" => "required",
            "email" => "required|unique:secretaries,email," . $secretary->id,
            "password" => "nullable",
            "phone_number" => "required|unique:secretaries,phone_number," . $secretary->id
        ]);
        if (isset($request->password)) {
            $password = Hash::make($request->password);
        } else {
            $password = $secretary->password;
        }
        $secretary->update([
            "full_name" => $request->full_name,
            "email" => $request->email,
            "password" => $password,
            "phone_number" => $request->phone_number,
        ]);
        return redirect()->route("dashboard.doctor.secretary.index");
    }

    public function destroy(Request $request, Secretary $secretary)
    {
        if (auth("doctor")->id() == $secretary->doctor_id) {
            $secretary->delete();
            return redirect()->route("dashboard.doctor.secretary.index");
        }
        abort(401);
    }

    public function clinic()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('doctor_id', auth('secretary')->user()->doctor->id)
            ->where('type', '=', 'Clinic')
            ->where('status', '=', 'Accepted')
            ->get();


        return view('secretary.appointments.index', compact('appoints'));
    }

    public function home()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('doctor_id', auth('secretary')->user()->doctor->id)
            ->where('type', '=', 'Home')
            ->get();

        return view('secretary.appointments.index', compact('appoints'));
    }

    public function pending()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('doctor_id', auth('secretary')->user()->doctor->id)
            ->where('status', '=', 'pending')
            ->get();

        return view('secretary.appointments.pending', compact('appoints'));
    }

    public function change_appointment_status(Request $request, Appointment $appointment)
    {
        //
        $request->validate([
            'status' => 'required',
        ]);
        $appointment->update([
            'status' => $request->status
        ]);

        return redirect()->route('secretary.appointments.pending');

    }
    public function destroyAppointment(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('dashboard.doctor.appointments.home');
    }
}
