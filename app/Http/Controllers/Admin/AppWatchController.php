<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppWatch;
use App\Models\Capacity;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Size;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppWatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $product = AppWatch::all();
        // return view('admin/product/appwatch/index', ['auth' => $auth , 'product' => $product]);
        return view('admin/product/appwatch/index', compact('auth','product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth = Auth::user();
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        $capacity = Capacity::all();
        // return view('admin/product/appwatch/create', ['auth' => $auth , 'category' => $category , 'color' => $color , 'size' => $size , 'capacity' => $capacity]);
        return view('admin/product/appwatch/create', compact('auth','category','color','size','capacity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new AppWatch();
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->id_color = $request->id_color;
        $product->id_size = $request->id_size;
        $product->id_capacity = $request->id_capacity;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();
        // Lưu các ảnh vào bảng product_images
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = time() .''. $image->getClientOriginalName();
                $image->move('images/myimg/product_appwatch', $filename);
                $productImage = new Image();
                $productImage->id_appwatch = $product->id;
                $productImage->id_category = $request->id_category;
                $productImage->path = 'images/myimg/product_appwatch/' . $filename;
                $productImage->save();
            }
        }
        return redirect('admin/appwatch');
    }

    /**
     * Display the specified resource.
     */
    public function show(AppWatch $appwatch)
    {
        return view('frontend/appwatch_detail',compact('appwatch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppWatch $appwatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppWatch $appwatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppWatch $appwatch)
    {
        $appwatch->delete();
        return redirect('admin/appwatch');
    }
}
