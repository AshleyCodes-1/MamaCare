<?php

namespace App\Http\Controllers;

use App\Models\WeeklyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeeklyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = WeeklyData::get()->sortDesc();
        return view('super-admin.week.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.week.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = new WeeklyData();
        $data->title = $request->title;
        $data->week = $request->week;
        $data->description = $request->description;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/week');
        }
        $data->save();


        return redirect(route('admin.week.index'))->with('success', 'Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(WeeklyData $Testimonial)
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
        $data = WeeklyData::find($id);
        return view('super-admin.week.edit', ['data'=>$data]);
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
        
        $data = WeeklyData::find($request->id);
        $data->title = $request->title;
        $data->week = $request->week;
        $data->description = $request->description;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/week');

        }
        $data->save();
        return redirect(route('admin.week.index'))->with('success', 'Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WeeklyData::find($id);
        $res = @unlink('storage/app/'.$data->week);
        $data->delete();
            
        return redirect(route('admin.week.index'))->with('success', 'Deleted');
    }
}