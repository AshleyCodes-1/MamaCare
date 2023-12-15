<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $blogs = Blog::where('user_id', Auth::user()->id)->count();
        return view('admin.dashboard', compact('blogs'));
    }

    public function feedbackShow(){
        $testimonial = Feedback::where('user_id', Auth::user()->id)->first();
        return view('admin.feedback.edit', compact('testimonial'));
    }
    public function adminFeedbackShow(){
        $testimonial = Feedback::all();
        return view('super-admin.feedback', compact('testimonial'));
    }

    public function feedbackUpdate(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'review' => ['required'],
            'rating' => ['required'],
        ]);
        
        $check = Feedback::where('user_id', Auth::user()->id)->first();
        if($check){
            $data = Feedback::where('user_id', Auth::user()->id)->first();
        }else{
            $data = new Feedback();

        }
        $data->title = $request->title;
        $data->user_id = Auth::user()->id;
        $data->review = $request->review;
        $data->rating = $request->rating;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/feedback');

        }
        $data->save();
        return redirect(route('feedback.show'))->with('success', 'Updated');
    }

    function bookAp(Request $request){
        $ap = Appointment::find($request->appointment_id);
        $ap->status = 1;
        $ap->save();

        $data = new AppointmentHistory();
        $data->appointment_id = $request->appointment_id;
        $data->user_id = Auth::user()->id;
        $data->status = 'Pending';
        $data->save();
        return redirect()->back()->with('success', 'Updated');
    }   

    public function addCart($id){
        $data = new Cart();
        $data->user_id = Auth::user()->id;
        $data->product_id = $id;
        $data->qty = 1;
        $data->save();
        return redirect()->route('cart')->with('success', 'Updated');
    }

    public function cart(){
        $data = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('website.cart', compact('data'));
    }

    public function removeCart($id){
        $data = Cart::where('id', $id)->delete();
        return redirect()->route('cart')->with('success', 'Updated');
    }

    public function checkout(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($carts as $cart){
            $data = new Order();
            $data->product_id = $cart->product_id;
            $data->user_id = Auth::user()->id;
            $data->qty = $cart->qty;
            $data->transaction_id = date("Ymd-His")."-".rand(111, 999);
            $data->status = "Approved";
            $data->save();
        }
        $carts = Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->route('cart')->with('success', 'Updated');
    }

    public function orders(){
        $data = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.orders', compact('data'));
    }

    public function myAppointment(){
        $data = AppointmentHistory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.appointment', compact('data'));
    }
}