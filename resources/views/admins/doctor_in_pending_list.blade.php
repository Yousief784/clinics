@extends('layouts.default_admins')

@section('content')
    <div>
        <div class="accordion mx-5" id="accordionExample">



            @foreach($pending_doctors as $doctor)
                <div class="accordion-item my-3">
                    <h2 class="accordion-header" id="heading{{ $doctor->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $doctor->id }}" aria-expanded="true" aria-controls="collapse{{ $doctor->id }}">
                            {{ 'Dr. ' . $doctor->user->first_name . ' ' . $doctor->user->middle_name . ' ' . $doctor->user->last_name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $doctor->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $doctor->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="d-flex align-items-bottom">
                                <h5>Certificate: </h5>
                                <p class="ms-1"><a href="{{ route('admin.download_certificate', ['doctor_id' => $doctor->id]) }}">{{ 'Dr/ ' . $doctor->user->first_name . ' Certificate' }}</a></p>
                            </div><!-- certificate -->

                            <div class="d-flex align-items-bottom">
                                <h5>Clinic License: </h5>
                                <p class="ms-1"><a href="{{ route('admin.download_clinic_license', ['doctor_id' => $doctor->id]) }}">{{ 'Dr/ ' . $doctor->user->first_name . ' Clinic License' }}</a></p>
                            </div><!-- clinic license -->

                            <div class="d-flex align-items-bottom">
                                <h5>Clinic Address: </h5>
                                <p class="ms-1"><a>{{ $doctor->clinic_address }}</a></p>
                            </div><!-- clinic address -->

                            <div class="d-flex align-items-bottom">
                                <h5>Clinic Governorate: </h5>
                                <p class="ms-1"><a>{{ $doctor->governorate->city_name_en }}</a></p>
                            </div><!-- clinic Governorate -->

                            <div class="d-flex align-items-bottom">
                                <h5>Clinic City: </h5>
                                <p class="ms-1"><a>{{ $doctor->city->governorate_name_en }}</a></p>
                            </div><!-- clinic Governorate -->

                            <div class="d-flex align-items-bottom">
                                <h5>Doctor Major: </h5>
                                <p class="ms-1"><a>
                                        @php
                                            try {
                                                if ($doctor->major->major){
                                                    echo $doctor->major->major;
                                                }
                                             }catch (Exception $ex){
                                                echo '';
                                             }
                                        @endphp
                                    </a></p>
                            </div><!-- Major -->

                            <div class="d-flex align-items-bottom">
                                <h5>Vezzeta: </h5>
                                <p class="ms-1"><a>{{ $doctor->pay_to_doctor }}</a></p>
                            </div><!-- Vezzeta -->

                            <div class="d-flex align-items-bottom">
                                <h5>Start At: </h5>
                                <p class="ms-1"><a>{{ $doctor->start_at->format('H:i:s') }}</a></p>
                            </div><!-- start at -->

                            <div class="d-flex align-items-bottom">
                                <h5>End At: </h5>
                                <p class="ms-1"><a>{{ $doctor->end_at->format('H:i:s') }}</a></p>
                            </div><!-- end at -->

                            <div class="d-flex align-items-bottom">
                                <h5>Holidays: </h5>
                                <p class="ms-1">
                                    @foreach($doctor->holidays as $holiday)
                                        {{ $holiday . ', ' }}
                                    @endforeach
                                </p>
                            </div><!-- Holidays -->

                            <div class="d-flex justify-content-end align-items-bottom">
                                <form action="{{ route('admin.store_doctor', ['pending_doctor_id' => $doctor->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" name="doctor_status" value="Approve" class="btn btn-success px-4">Approve</button>
                                    <button type="submit" name="doctor_status" value="Refuse" class="btn btn-danger px-4">Refuse</button>
                                </form>
                            </div><!-- buttons -->

                        </div><!-- accordion body -->
                    </div><!-- accordion collapse -->
                </div><!-- accordion item -->
            @endforeach
        </div><!-- accordion -->
    </div><!-- main div -->
@endsection
