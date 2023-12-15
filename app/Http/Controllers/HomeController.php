<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\WeeklyData;
use App\Models\Appointment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $feedbacks = Feedback::select('users.name', 'feedback.*')->join('users', 'users.id', '=', 'feedback.user_id')->orderBy('feedback.id', 'DESC')->get();
        $blogs = Blog::select('users.name', 'blogs.*')->join('users', 'users.id', '=', 'blogs.user_id')->orderBy('blogs.id', 'DESC')->get();
        if(Auth::user()){
            $doctorsSp = Doctor::select('specialization')->where('city_id', Auth::user()->city)->distinct()->get();
            $doctors = Doctor::where('city_id', Auth::user()->city)->get();
        }else{
            $doctorsSp = Doctor::select('specialization')->distinct()->get();
            $doctors = Doctor::all();
        }
        return view('website.index', compact('feedbacks', 'blogs', 'doctors', 'doctorsSp'));
    }

    public function about(){
        return view('website.about');
    }

    public function PregnancyStages(Request $request){
        $weeks = WeeklyData::orderBy('week', 'ASC')->get();

        if(isset($request->week_id) && $request->week_id != null){
            $data = WeeklyData::find($request->week_id);
        }else{
            $data = WeeklyData::first();
        }
        return view('website.PregnancyStages', compact('data', 'weeks'));
    }

    public function blogDetails($id){
        $blog = Blog::select('users.name', 'blogs.*')->join('users', 'users.id', '=', 'blogs.user_id')->orderBy('blogs.id', 'DESC')->where('blogs.id', $id)->first();
        return view('website.blog-details', compact('blog'));
    }

    public function doctorDetails($id){
        $data = Doctor::where('id', $id)->first();
        return view('website.doctor-details', compact('data'));
    }

    public function products(){
        $data = Product::all();
        return view('website.products', compact('data'));
    }
}