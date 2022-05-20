<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('certifications')->get();
        
        return view('welcome', compact('doctors'));
    }
}
