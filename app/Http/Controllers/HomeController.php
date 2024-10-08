<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {

        $all_doctors = Doctor::all()->count();
        $all_animals = Animal::all()->count();
        $all_appointments = Appointment::all()->count();
        $doctors  = Doctor::all()->take(25);
//        query()
//            ->select(['doctors.*', 'rates.*', DB::raw('AVG(rate) as rating')])
//            ->join('rates', 'doctors.id', '=', 'doctor_id')
//            ->groupBy(['doctor_id'])
//            ->having('rating',  '>=', '3')
//            ->get();
        return view('welcome', compact('doctors', 'all_appointments', 'all_doctors', 'all_animals'));
    }

    public function aboutUs()
    {
        $all_doctors = Doctor::all()->count();
        return view('about-us', compact('all_doctors'));
    }

    public function search(Request $request)
    {
        $request->validate([
            "words" => "required"
        ]);

        $doctors = Doctor::where("full_name", "like", "%" . $request->words . "%")->orWhere("country","like", "%" . $request->words . "%")->orWhere("city","like", "%" . $request->words . "%")->get();
        return view("search", compact("doctors"));
    }
}
