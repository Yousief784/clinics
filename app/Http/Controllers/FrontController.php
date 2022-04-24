<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        //dd($doctors);
        return view('users.index', [
            'doctors' => $doctors
        ]);
    }

    public function show($doctor_id){
        $doctor = Doctor::find($doctor_id);
        $appointment = Appointment::where('doctor_id', $doctor_id)->get();
        return view('users.show', [
            'doctor' => $doctor,
            'appointment' => $appointment
        ]);
    }
}
