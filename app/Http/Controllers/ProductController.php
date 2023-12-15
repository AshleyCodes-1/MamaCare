<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::get()->sortDesc();
     
        return view('super-admin.product.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.product.add');
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
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required'],
        ]);
        
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->desc;
        $data->price = $request->price;
        $data->stock = $request->stock;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/product');
        }
        $data->save();


        return redirect(route('admin.product.index'))->with('success', 'Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function orders(Product $Testimonial)
    {
        $data = Order::get()->sortDesc();
        return view('super-admin.product.order', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return view('super-admin.product.edit', ['data'=>$data]);
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
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required'],
        ]);
        
        $data = Product::find($request->id);
        $data->title = $request->title;
        $data->description = $request->desc;
        $data->price = $request->price;
        $data->stock = $request->stock;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/blog');

        }
        $data->save();
        return redirect(route('admin.product.index'))->with('success', 'Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $res = @unlink('storage/app/'.$data->image);
        $data->delete();
            
        return redirect(route('admin.product.index'))->with('success', 'Deleted');
    }
}