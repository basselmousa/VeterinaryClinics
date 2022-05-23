<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    //

    public function clinic()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('user_id', auth()->id())
            ->where('type', '=', 'Clinic')
            ->get();

//        $appoints = auth()->user()->appoints()->where('type', '=', 'Clinic')->get();
//        dd($appoints);
        return view('user.appointments.index', compact('appoints'));
    }

    public function home()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('user_id', auth()->id())
            ->where('type', '=', 'Home')
            ->get();

//        $appoints = auth()->user()->appoints()->where('type', '=', 'Clinic')->get();
//        dd($appoints);
        return view('user.appointments.index', compact('appoints'));
    }

    public function destroy(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('user.appointments.index');
    }

}
