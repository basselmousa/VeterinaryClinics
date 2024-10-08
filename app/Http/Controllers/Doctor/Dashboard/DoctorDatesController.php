<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DoctorDate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DoctorDatesController extends Controller
{
    //

    public function index()
    {
        $dates = auth('doctor')->user()->dates;

        return view('doctor.dates.index', compact('dates'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'type' => 'required' ,
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'price' => 'required|numeric'
        ]);

        foreach ($request->day as $day) {
            auth('doctor')->user()->dates()->create([
                'type' => $request->type,
                'day' => $day,
                'start_time' =>Carbon::make($request->start_time)->toTimeString(),
                'end_time' =>Carbon::make($request->end_time)->toTimeString(),
                'price' => $request->price
            ]);
        }
        return redirect()->route('dashboard.doctor.dates.index');
    }

    public function destroy(Request $request, DoctorDate $date)
    {
        if ($date->doctor_id == auth('doctor')->user()->id){

            $date->delete();
            return redirect()->route('dashboard.doctor.dates.index');
        }
        abort(401);
    }
}
