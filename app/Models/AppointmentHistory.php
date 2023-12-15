<?php

namespace App\Models;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHistory extends Model
{
    use HasFactory;

    public function user()  
    {  
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }

    public function ap()  
    {  
        return $this->belongsTo(Appointment::class, 'appointment_id', 'id'); 
    }
}