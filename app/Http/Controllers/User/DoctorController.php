<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Nette\Schema\ValidationException;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    //

    public function index()
    {
        $doctors = Doctor::with('certifications')->where("active", "=",true)->paginate(15);
//        dd($doctors);
        $nearestDoctors = Doctor::with('certifications')->where("active", "=",true)->where('city', '=', auth()->user()->city)->paginate(15, '*', 'nearest');
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
            ->where('type', '=', $request->type)
            ->get(['start_time', 'end_time'])->values()->toArray();

//        dd($times[0]['start_time'], $times[0]['end_time']);
//        dd(count($times));
        if (count($times) > 0) {
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


            return redirect()->route('user.doctors.index')->with('success', 'Appointed');
        }
        throw \Illuminate\Validation\ValidationException::withMessages([
            'date' => 'Please choose date tht doctor work\'s on'
        ]);

    }

    public function search(Request $request)
    {
        $request->validate([
            "search" => "required"
        ]);
        $nearestDoctors = Doctor::with('certifications')->where("active", "=", true)->where("full_name", "like", "%". $request->search ."%" )->where('city', '=', auth()->user()->city)->paginate(15, '*', 'nearest');
        $doctors = Doctor::with('certifications')->where("full_name", "like", "%". $request->search ."%" )->paginate(15);
        return view('user.doctors.search', compact('doctors', 'nearestDoctors'));
    }
}
