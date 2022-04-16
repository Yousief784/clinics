<?php

namespace App\Http\Controllers;

use App\Models\DaysOfWeek;
use Response;
use App\Models\Doctor;
use App\Models\Major;
use App\Models\PendingDoctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admins.index');
    }

    public function doctor_in_pending_list(){
        $pending_doctors = PendingDoctor::all();
        $days_of_week = DaysOfWeek::all();
//        dd($pending_doctors[31]);
        return view('admins.doctor_in_pending_list', [
            'pending_doctors' => $pending_doctors,
            'days_of_week' => $days_of_week
        ]);
    }

    public function store_doctor(Request $request, $pending_doctor_id){
        $doctor = PendingDoctor::where('id', $pending_doctor_id)->firstOrFail();

        if ($request->doctor_status != 'Approve'){
            $doctor->delete();
            return redirect()->back()->with('status', 'you delete doctor request');
        }

        Doctor::create([
            'user_id' => $doctor->user_id,
            'certificate' => $doctor->certificate,
            'clinic_license' => $doctor->clinic_license,
            'clinic_address' => $doctor->clinic_address,
            'governorate_id' => $doctor->governorate_id,
            'city_id' => $doctor->city_id,
            'major_id' => $doctor->major_id,
            'holidays' => $doctor->holidays,
            'pay_to_doctor' => $doctor->pay_to_doctor,
            'start_at' => $doctor->start_at,
            'end_at' => $doctor->end_at,
        ]);

        $doctor->delete();

        return redirect()->back()->with('status', 'Doctor Added!');
    }

    public function create_new_major(){
        $all_majors = Major::all();
        return view('admins.create_new_major',[
            'all_majors' => $all_majors
        ]);
    }

    public function store_new_major(Request $request){
        $request->validate([
            'major' => ['required', 'string', 'max:255'],
        ]);

        Major::create($request->all());

        return redirect()->back()->with('status', 'Major Added Successfully');

    }

    public function update_major(Request $request, $major_id){
        $major = Major::find($major_id);
        $major->update([
            'major' => $request->major,
        ]);

        return redirect()->back()->with('status', 'Major Updated Successfully');
    }

    public function destroy_major(Request $request, $major_id){
        $major = Major::find($major_id);
        $major->delete();
        return redirect()->back()->with('status', 'Major Deleted Successfully');
    }

    public function download_certificate($doctor_id){
        $doctor = PendingDoctor::firstWhere('id', $doctor_id);
        $file_path = public_path($doctor->certificate);
        return Response::download($file_path);
    }

    public function download_clinic_license($doctor_id){
        $doctor = PendingDoctor::firstWhere('id', $doctor_id);
        $file_path = public_path($doctor->clinic_license);
        return Response::download($file_path);
    }
}
