<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Nette\Schema\ValidationException;

class DoctorController extends Controller
{
    //

    public function index()
    {
        $doctors = Doctor::with('certifications')->paginate(15);
        $nearestDoctors = Doctor::with('certifications')->where('city', '=', auth()->user()->city)->paginate(15, '*', 'nearest');
        return view('user.doctors.index', compact('doctors', 'nearestDoctors'));
    }

    public function show_appoint(Request $request, Doctor $doctor)
    {
        $types = $doctor->dates()->distinct()->get(['type']);

        return view('user.doctors.appoint', compact('doctor', 'types'));
    }

    public function appoint(Request $request, Doctor $doctor)
    {
        //

        $request->validate([
            'date' => 'required|after_or_equal:now',
            'type' => 'required',
            'animal' => 'required'
        ]);
//        dd(Carbon::make($request->time)->addHours(13)->toTimeString());


        $times  = $doctor->dates()->where('day', Carbon::make($request->date)->getTranslatedDayName())
            ->where('type', '=', 'Clinic')
            ->get(['start_time', 'end_time'])->values()->toArray();

//        dd($times[0]['start_time'], $times[0]['end_time']);
        $request->validate([
            'time' => 'required|after_or_equal:'.$times[0]['start_time'] . '|before_or_equal:'. $times[0]['end_time'],
        ]);
        auth()->user()->appoints()->attach(auth()->id(), [
            'doctor_id' => $doctor->id,
            'animal_id' => $request->animal,
            'date' => Carbon::make($request->date),
            'time' => Carbon::make($request->time)->toTimeString(),
            'type' => $request->type,
        ]);

        return  redirect()->route('user.doctors.index')->with('success', 'Appointed');


    }
}
