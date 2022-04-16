<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendingDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'certificate' => ['required', 'file'],
            'clinic_license' => ['required', 'file'],
            'clinic_address' => ['required', 'string', 'max:255'],
            'governorate_id' => ['required'],
            'city_id' => ['required'],
            'major_id' => ['required'],
            'start_at' => ['required'],
            'end_at' => ['required'],
        ];
    }
}
