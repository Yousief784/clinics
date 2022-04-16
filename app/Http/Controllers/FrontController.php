<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        dd($doctors);
        return view('users.index', [
            'doctors' => $doctors
        ]);
    }
}
