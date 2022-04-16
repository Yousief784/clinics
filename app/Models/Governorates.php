<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorates extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'governorate_id';
    public $timestamps = false;

    public function pending_doctors(){
        return $this->hasMany(PendingDoctor::class, 'governorate_id', 'governorate_id');
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
