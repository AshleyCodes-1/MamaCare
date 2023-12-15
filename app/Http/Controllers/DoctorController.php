<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Doctor::get()->sortDesc();
     
        return view('super-admin.doctor.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();
        return view('super-admin.doctor.add', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $data = new Doctor();
        $data->city_id = $request->city_id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->specialization = $request->specialization;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/doctor');
        }
        $data->save();


        return redirect(route('admin.doctor.index'))->with('success', 'Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $Testimonial)
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
        $data = Doctor::find($id);
        $city = City::all();
        return view('super-admin.doctor.edit', ['data'=>$data, 'city'=>$city]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $data = Doctor::find($request->id);
        $data->city_id = $request->city_id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->specialization = $request->specialization;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/doctor');

        }
        $data->save();
        return redirect(route('admin.doctor.index'))->with('success', 'Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Doctor::find($id);
        $res = @unlink('storage/app/'.$data->image);
        $data->delete();
            
        return redirect(route('admin.doctor.index'))->with('success', 'Deleted');
    }
}