<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index($doctor_id){
        $doctor = Doctor::find($doctor_id);
        $appointments = Appointment::where('doctor_id', Auth::id())->get();
        return view('doctors.index', [
            'doctor' => $doctor,
            'appointments' => $appointments
        ]);
    }
}
