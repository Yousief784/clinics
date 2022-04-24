@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-2">
            @foreach($doctors as $doctor)
                @if($doctor->user_id == \Illuminate\Support\Facades\Auth::id())
                    <a href="{{ route('doctor.index', ['doctor_id' => $doctor->id]) }}" class="btn btn-outline-dark me-3">Doctor Page</a>
                @endif
            @endforeach
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div class="col-lg-9 mx-auto">
        @foreach($doctors as $doctor)
                <div class="card text-center">
                    <div class="card-header text-start d-flex align-items-end">
                        <img src="{{ asset($doctor->user->user_profile_image) }}" width="40">
                        <h3 class="fw-bold ms-2">Dr/ {{ $doctor->user->first_name . ' ' . $doctor->user->last_name }} {{ $doctor->user_id  }}</h3>
                    </div><!-- card header -->
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <h4 class="fw-bold">Governorate:</h4>
                            <h5 class="ms-3">{{ $doctor->governorate->governorate_name_en }}</h5>
                        </div><!-- governorate -->

                        <div class="d-flex align-items-end">
                            <h4 class="fw-bold">City:</h4>
                            <h5 class="ms-3">{{ $doctor->city->city_name_en }}</h5>
                        </div><!-- city -->

                        <div class="d-flex align-items-end">
                            <h4 class="fw-bold">Address Details:</h4>
                            <h5 class="ms-3">{{ $doctor->clinic_address }}</h5>
                        </div><!-- details_address -->

                        <div class="d-flex align-items-end">
                            <h4 class="fw-bold">Address Details:</h4>
                            <h5 class="ms-3">{{ $doctor->major->major }}</h5>
                        </div><!-- major -->

                        <div class="d-flex align-items-end">
                            <h4 class="fw-bold">Vezzeta:</h4>
                            <h5 class="ms-3">{{ $doctor->pay_to_doctor }} $</h5>
                        </div><!-- Vezzeta -->

                        <a href="{{ route('show_doctor_page', ['doctor_id' => $doctor->id]) }}" class="btn btn-primary">Show Doctor Page</a>



                    </div><!-- card body -->
                    <div class="card-footer text-muted">
                        2 days ago
                    </div><!-- card footer -->
                </div><!-- card -->



            @endforeach
        </div><!-- col-9 left -->
    </div><!-- row -->



@endsection
