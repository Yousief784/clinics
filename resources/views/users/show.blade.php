@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <img src="{{ asset($doctor->user->user_profile_image) }}" class="img-fluid rounded-circle">
                            </div><!-- left doctor image -->
                            <div class="col-lg-9">
                                <div class="d-flex align-items-end">
                                    <h4 class="fw-bold">Dr/</h4>
                                    <h4 class="ms-2 fw-bold">{{ $doctor->user->first_name . ' ' . $doctor->user->middle_name . ' ' . $doctor->user->last_name }}</h4>
                                </div><!-- Name -->

                                <div class="d-flex align-items-end">
                                    <h4 class="fw-bold">Address:</h4>
                                    <h5 class="ms-3">{{ $doctor->clinic_address . ' -' . $doctor->city->city_name_en . ' -' . $doctor->governorate->governorate_name_en }}</h5>
                                </div><!-- Address -->

                                <div class="d-flex align-items-end">
                                    <h4 class="fw-bold">Major:</h4>
                                    <h5 class="ms-3">{{ $doctor->major->major }}</h5>
                                </div><!-- Major -->

                                <div class="d-flex align-items-end">
                                    <h4 class="fw-bold">Vezzeta:</h4>
                                    <h5 class="ms-3">{{ $doctor->pay_to_doctor }}</h5>
                                </div><!-- Major -->

                            </div><!-- right doctor information -->
                        </div><!-- row inside doctor information -->
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col-left doctor information -->


            <div class="col-lg-3 d-flex justify-content-center">
                @auth
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#make_appointment" onclick="date({{ $doctor->id  }})">Make Appointment</button>
                <!-- Start Modal Edit -->
                <div class="modal fade" id="make_appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Make an Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#make_appointment_to_my_self" type="button" role="tab" aria-controls="nav-home" aria-selected="true">for my self</button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#make_appointment_to_another_person" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">for another person</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="make_appointment_to_my_self" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form action="{{ route('appointment.make_appointment_to_my_self', ['doctor_id' => $doctor->id]) }}" method="post">
                                            @csrf
                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Date</h4>
                                                <input type="text" class="form-control ms-3 date datepicker{{ $doctor->id }}" id="date" name="day" required>
                                            </div><!-- date -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Time</h4>
                                                <input type="text" class="time{{ $doctor->id }} form-control ms-3"  name="time" required>
                                            </div><!-- time -->
                                            <div class="d-grid mt-3">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div><!-- button -->
                                        </form><!-- for me -->
                                    </div>
                                    <div class="tab-pane fade" id="make_appointment_to_another_person" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <form action="{{ route('appointment.make_appointment_to_another_person', ['doctor_id' => $doctor->id]) }}" method="post">
                                            @csrf
                                            <div class="d-flex align-items-end mt-3">
                                                <h4>First Name</h4>
                                                <input type="text" class="form-control ms-3" name="first_name" required>
                                            </div><!-- first_name -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Middle Name</h4>
                                                <input type="text" class="form-control ms-3" name="middle_name" required>
                                            </div><!-- middle_name -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Last Name</h4>
                                                <input type="text" class="form-control ms-3" name="last_name" required>
                                            </div><!-- last_name -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Age</h4>
                                                <input type="number" class="form-control ms-3" name="age" required>
                                            </div><!-- age -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Gender</h4>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male">
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female">
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                </div>
                                            </div><!-- gender -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Date</h4>
                                                <input type="text" class="form-control ms-3 date datepicker{{ $doctor->id }}" name="day" id="" required>
                                            </div><!-- date -->

                                            <div class="d-flex align-items-end mt-3">
                                                <h4>Time</h4>
                                                <input type="text" class="form-control ms-3 time{{ $doctor->id }}" name="time" required>
                                            </div><!-- time -->

                                            <div class="d-grid mt-3">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div><!-- button -->

                                        </form><!-- for other person -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Edit -->
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="link-danger">Login to Make Appointment</a>
                @endguest
            </div><!-- col-right make_appointment -->


        </div><!-- row -->
    </div><!-- container -->

    <script>
        let doctor = @json($doctor);
        let global_varibles = {}
        function date(doctor_id){
            global_varibles.doctor_id = doctor_id
            $(`.datepicker${doctor_id}`).datepicker({
                beforeShowDay: disable_date,
                minDate: 1,
                maxDate: 20
            });


            let my_days = doctor.holidays
            let days_id = []
            const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

            days.forEach(function (day) {
                my_days.forEach(function (holiday) {
                    if (day == holiday) {
                        days_id.push(days.indexOf(day))
                    }
                })
            })
            // console.log(global_varibale.doctor_id)

            function disable_date(date) {
                let string = $.datepicker.formatDate('yy-mm-dd', date);
                let filterDate = new Date(string);
                let day = filterDate.getDay()
                return [(days_id.indexOf(day) == -1)];
            }
        }



        $(`.date`).change(function (){

            let booked_time = @json($appointment);
            let date = document.getElementById('date')
            date = (date.value).split('/')
            let year = date[2]
            let month = date[0]
            let day = date[1]
            date = `${year}-${month}-${day}`
            let time_to_disable = booked_time.filter(day => day.day == date)
            let disabled_time = []
            time_to_disable.forEach(time =>{
                let time_split = time.time.split(":")
                disabled_time.push([`${time.time}`, `${time_split[0]}:${parseInt(time_split[1])+1}:00`])
            })


            let start_time = doctor.start_at
            let end_time = doctor.end_at
            end_time = end_time.split(':')
            let end_hour = parseInt(end_time[0]) - 1
            let end_minute = parseInt(end_time[1]) + 30
            let end_second = parseInt(end_time[2])
            end_time = `${end_hour}:${end_minute}:00`

            $(document).ready(function(){
                $(`.time${doctor.id}`).timepicker({
                    step: 30,
                    'minTime': start_time,
                    'maxTime': end_time,
                    'disableTimeRanges': disabled_time
                });
            });
        })


    </script>
@endsection
