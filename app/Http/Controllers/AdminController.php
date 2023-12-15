<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Feedback;
use App\Models\Doctor;
use App\Models\City;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::count();
        $orders = Order::count();
        $feedbacks = Feedback::count();
        $city = City::count();
        $doctor = Doctor::count();
        $appointment = Appointment::count();
        $appointmentHis = AppointmentHistory::count();
        $products = Product::count();
        return view('super-admin.dashboard', compact('blogs', 'orders', 'feedbacks', 'city', 'doctor', 'appointment', 'appointmentHis', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userList()
    {
        $users = User::all();
        return view('super-admin.users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}