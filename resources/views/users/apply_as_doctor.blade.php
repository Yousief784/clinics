@extends('layouts.main')

@section('content')
<div class="mt-3 container col-lg-8 mx-auto">
    <h2 class="fw-bold mb-3">Apply as Doctor</h2>
    <form action="{{ route('apply_as_doctor.store_pending_doctor') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label><h4>Clinci Address</h4></label>
            <input type="text" name="clinic_address" class="form-control @error('clinic_address') is-invalid @enderror" placeholder="Clinic Address" required>
            @error('clinic_address')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- clinic address -->
        <div>
            <label class="mt-3"><h4>Governorates</h4></label>
            <select id="governorate" name="governorate_id" class="form-select"  onchange="show_select_cities()" required>
                @foreach($governorates as $governorate)
                    <option value="{{ $governorate->governorate_id }}">{{ $governorate->city_name_en }}</option>
                @endforeach
            </select>
            @error('governorate')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- select governorates -->

        <div id="select_cities">
            <label id="cities_label" class="mt-3"><h4>Cities</h4></label>
            <select id="city_select" name="city_id" class="form-select" required>
                <option>-----</option>
            </select>
            @error('city_select')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- select Cities -->

        <div>
            <label id="major" class="mt-3"><h4>Major</h4></label>
            <select id="major" name="major_id" class="form-select" required>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->major }}</option>
                @endforeach
            </select>
            @error('major')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- Major -->

        <div>
            <label id="vezzta" class="mt-3"><h4>Vezzeta</h4></label>
            <input type="number" name="pay_to_doctor" class="form-control @error('pay_to_doctor') is-invalid @enderror" required>
            @error('pay_to_doctor')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- Vezzeta -->

        <div>
            <label id="major" class="mt-3 d-block"><h4>Holidays</h4></label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach($days_of_week as $day)
                    <input type="checkbox" name="holidays[{{ $day->day }}]" class="btn-check mx-3" id="btncheck{{ $day->day }}" autocomplete="off" {{ 'checked' ? $day->id: $day->day }}>
                    <label class="btn btn-outline-primary mx-2" for="btncheck{{ $day->day }}">{{ $day->day }}</label>
                @endforeach
            </div>
        </div><!-- holidays -->

        <div class="d-flex row row-cols-2">
            <div class="col">
                <label class="mt-3 d-block"><h4>Start AT</h4></label>
                <input type="text" class="form-control start_end_time @error('start_at') is-invalid @enderror" name="start_at" required>
                @error('start_at')
                <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label class="mt-3 d-block"><h4>End AT</h4></label>
                <input type="text"  class="form-control start_end_time @error('end_at') is-invalid @enderror" name="end_at" required>
                @error('end_at')
                <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
        </div><!-- end at -->

        <div>
            <label id="certificate" class="mt-3"><h4>Doctor Certificate</h4></label>
            <input type="file" name="certificate" class="form-control @error('certificate') is-invalid @enderror" required>
            @error('certificate')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- certificate -->

        <div>
            <label id="clinic_license" class="mt-3"><h4>Clinic License</h4></label>
            <input type="file" name="clinic_license" class="form-control @error('clinic_license') is-invalid @enderror" required>
            @error('clinic_license')
            <div class="text-danger">*{{ $message }}</div>
            @enderror
        </div><!-- clinic license -->

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success btn-lg">Apply</button>
        </div>

    </form>
</div><!-- parent -->

    <script>
        function show_select_cities(){
            let element = document.getElementById('city_select')
            while (element.length > 0) {
                element.remove(0);
            }
            let cities_label = document.getElementById('cities_label')
            cities_label.removeAttribute('hidden')
            let parent = document.getElementById('select_cities')
            let select = document.getElementById('governorate');
            let value = select.options[select.selectedIndex].value;
            let all_cities = @json($cities);
            let cities = all_cities.filter(function (city){
                return city.governorate_id == value
            })
            console.log(all_cities)
            console.log(cities)
            cities.forEach(function (city) {
                let option = document.createElement("option");
                option.value = city.id;
                option.text = city.governorate_name_en;
                element.appendChild(option);
                console.log(option)
            })
        }

        $(document).ready(function(){
            $('.start_end_time').timepicker({
                timeFormat: 'H:mm',
                interval: 60,
                minTime: '0',
                maxTime: '23:00pm',
                defaultTime: '0',
                startTime: '0:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        });

    </script>
@endsection

