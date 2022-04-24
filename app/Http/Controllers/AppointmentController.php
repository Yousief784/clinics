<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class AppointmentController extends Controller
{
    public function make_appointment_to_my_slef(Request $request, $doctor_id){
        $request->validate([
            'day' => ['required'],
            'time' => ['required']
        ]);

        Appointment::create([
            'day' => $request->day,
            'time' => $request->time,
            'doctor_id' => $doctor_id,
            'patient_id' => Auth::id()
        ]);

        $doctor = Doctor::find($doctor_id);
        $doctor->sum_pay_to_doctor = $doctor->sum_pay_to_doctor + ($doctor->pay_to_doctor * 90 /100);
        $doctor->save();

        $admins = Admin::get();

        foreach ($admins as $admin){
            $admin->admin_percentage = ($doctor->pay_to_doctor * 10 /100) / count($admins);
            $admin->save();
        }

        return redirect()->back()->with('status', 'you make appointment');
    }

    public function make_appointment_to_another_person(Request $request, $doctor_id){
        $request->validate([
            'day' => ['required'],
            'time' => ['required']
        ]);
    }
}
