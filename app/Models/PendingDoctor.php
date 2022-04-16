<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingDoctor extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'start_at',
        'end_at',
    ];

    public function setHolidaysAttribute($value)
    {
        $this->attributes['holidays'] = json_encode($value);
    }

    public function getHolidaysAttribute($value)
    {
        return $this->attributes['holidays'] = json_decode($value);
    }

    protected $guarded = ['all_pay_to_doctor'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function governorate(){
        return $this->belongsTo(Governorates::class, 'governorate_id', 'governorate_id');
    }

    public function city(){
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }

}
