<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capacity;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;

use App\Models\Product;
use App\Models\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $product = Product::all();
        // return view('admin/product/iphone/index', ['auth' => $auth , 'product' => $product]);
        return view('admin/product/iphone/index', compact('auth','product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth = Auth::user();
        $category = Category::all();
        $color = Color::all();
        $ram = Ram::all();
        $capacity = Capacity::all();
        // return view('admin/product/iphone/create', ['auth' => $auth , 'category' => $category , 'color' => $color , 'ram' => $ram , 'capacity' => $capacity]);
        return view('admin/product/iphone/create', compact('auth','category','color','ram','capacity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->id_color = $request->id_color;
        $product->id_ram = $request->id_ram;
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
                $image->move('images/myimg/product_iphone', $filename);
                $productImage = new Image();
                $productImage->id_product = $product->id;
                $productImage->id_category = $request->id_category;
                $productImage->path = 'images/myimg/product_iphone/' . $filename;
                $productImage->save();
            }
        }
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('frontend/product_detail',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/product');
    }
}
