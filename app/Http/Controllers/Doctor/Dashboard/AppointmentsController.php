<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function clinic()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('doctor_id', auth('doctor')->user()->id)
            ->where('type', '=', 'Clinic')
            ->where('status', '=', 'Accepted')
            ->get();


        return view('doctor.appointments.index', compact('appoints'));
    }

    public function home()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('doctor_id', auth('doctor')->user()->id)
            ->where('type', '=', 'Home')
            ->get();

        return view('doctor.appointments.index', compact('appoints'));
    }

    public function pending()
    {
        $appoints = Appointment::with('user','doctor', 'animal')
            ->where('doctor_id', auth('doctor')->user()->id)
            ->where('status', '=', 'pending')
            ->get();

        return view('doctor.appointments.pending', compact('appoints'));
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

    public function write_report(Request $request, Appointment $appointment)
    {
        //
        $request->validate([
            'prescription' => ['required'],
            'recommendation' => ['required'],
        ]);

        $appointment->animal->report()->attach($appointment->animal_id,[
            'recommendation' => $request->recommendation,
            'prescription' => $request->prescription,
            'doctor_id' => auth('doctor')->id()
        ]);

        $appointment->update([
            'status' => 'Done'
        ]);

        return redirect()->back()->with('success', 'Report written successfully');

    }

    public function destroy(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('dashboard.doctor.appointments.home');
    }

}
