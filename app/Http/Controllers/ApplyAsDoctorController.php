<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendingDoctorRequest;
use App\Models\Cities;
use App\Models\DaysOfWeek;
use App\Models\Governorates;
use App\Models\Major;
use App\Models\PendingDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyAsDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorates::all();
        $cities = Cities::all();
        $majors = Major::all();
        $days_of_week = DaysOfWeek::all();
        return view('users.apply_as_doctor', [
            'governorates' => $governorates,
            'cities' => $cities,
            'majors' => $majors,
            'days_of_week' => $days_of_week
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_pending_doctor(PendingDoctorRequest $request)
    {
        // files

        $file_name_certificate = 'dr_' . Auth::user()->first_name . '_' . Auth::user()->middle_name . '_' . Auth::user()->last_name . '_certificate.' . $request->certificate->getClientOriginalExtension();
        $request->certificate->move(public_path('uploaded_files/doctor_certificate'), $file_name_certificate);
        $path_certificate = 'uploaded_files/doctor_certificate/'. $file_name_certificate;

        $file_name_clinic_license = 'dr_' . Auth::user()->first_name . '_' . Auth::user()->middle_name . '_' . Auth::user()->last_name . '_clinic_license.' . $request->clinic_license->getClientOriginalExtension();
        $request->clinic_license->move(public_path('uploaded_files/doctor_clinic_license'), $file_name_clinic_license);
        $path_clinic_license = 'uploaded_files/doctor_clinic_license/'. $file_name_clinic_license;

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        //holidays
        $holidays_day = [];
        foreach ($request->holidays as $holiday_key => $holiday_value){
            array_push($holidays_day, $holiday_key);
        }

        $request['holidays'] = $holidays_day;
//        dd($request);
        $pending_doctor = PendingDoctor::create($request->all());
        $pending_doctor->certificate = $path_certificate;
        $pending_doctor->clinic_license = $path_clinic_license;
        $pending_doctor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response Hello worll
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
