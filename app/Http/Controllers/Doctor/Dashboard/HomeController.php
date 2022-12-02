<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {

        return view('doctor.home');
    }
}
