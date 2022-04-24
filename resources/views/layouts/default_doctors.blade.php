@extends('layouts.default')

@section('dashboard')
    <h2 class="text-center">Clinics</h2>
    @yield('doctor')
    @foreach($doctor as $doctor_clinics)
        {{ $doctor_clinics->clinic_address }}
    @endforeach
@endsection
