<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;


    protected $guarded = [];
    public $timestamps = false;

    public function pending_doctors(){
        return $this->hasMany(PendingDoctor::class, 'city_id', 'id');
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
