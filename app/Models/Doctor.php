<?php

namespace App\Models;
use App\Models\City;
use App\Models\Appointment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function city()  
    {  
        return $this->belongsTo(City::class, 'city_id', 'id'); 
    }

    public function appointments()  
    {  
        return $this->hasMany(Appointment::class, 'doctor_id', 'id')->where('status', 0); 
    }
}