<?php

namespace App\Http\Controllers\Doctor\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //

    public function index()
    {

        $reports = Report::with(['animal', 'doctor'])->where('doctor_id', auth("doctor")->id())->get();


        return view('doctor.reports.index', compact('reports'));

    }
}
