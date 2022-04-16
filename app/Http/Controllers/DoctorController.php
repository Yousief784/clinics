<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    protected $dates = [
        'created_at',
        'updated_at',
        'start_at',
        'end_at',
    ];

    public function index(){
        $appointments = Appointment::where('doctor_id', Auth::id())->get();
    }
}
