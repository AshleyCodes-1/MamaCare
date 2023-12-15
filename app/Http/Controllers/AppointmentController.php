<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Appointment::get()->sortDesc();
        return view('super-admin.appointment.index', ['data'=>$data]);
    }

    public function history()
    {
        $data = AppointmentHistory::get()->sortDesc();
        return view('super-admin.appointment.history', ['data'=>$data]);
    }

    public function complete($id){
        $data = AppointmentHistory::find($id);
        $data->status = "Complete";
        $data->save();

        $data2 = Appointment::find($data->appointment_id);
        $data2->status = 0;
        $data2->save();
        return redirect(route('admin.appointment.history'))->with('success', 'Updated');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('super-admin.appointment.add', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = new Appointment();
        $data->doctor_id = $request->doctor_id;
        $data->from = $request->from;
        $data->to = $request->to;
        
        $data->save();


        return redirect(route('admin.appointment.index'))->with('success', 'Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $Testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Appointment::find($id);
        $doctors = Doctor::all();
        return view('super-admin.appointment.edit', ['data'=>$data, 'doctors'=>$doctors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $data = Appointment::find($request->id);
        $data->doctor_id = $request->doctor_id;
        $data->from = $request->from;
        $data->to = $request->to;
        
        $data->save();
        return redirect(route('admin.appointment.index'))->with('success', 'Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Appointment::find($id);
        $res = @unlink('storage/app/'.$data->appointment);
        $data->delete();
            
        return redirect(route('admin.appointment.index'))->with('success', 'Deleted');
    }
}