<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MacBook;
use App\Models\Ram;
use App\Models\Category;
use App\Models\Color;
use App\Models\Capacity;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MacBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $product = MacBook::all();
        // return view('admin/product/macbook/index', ['auth' => $auth , 'product' => $product]);
        return view('admin/product/macbook/index', compact('auth','product'));
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
        // return view('admin/product/macbook/create', ['auth' => $auth , 'category' => $category , 'color' => $color , 'ram' => $ram , 'capacity' => $capacity]);
        return view('admin/product/macbook/create', compact('auth','category','color','ram','capacity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new MacBook();
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
                $image->move('images/myimg/product_macbook', $filename);
                $productImage = new Image();
                $productImage->id_macbook = $product->id;
                $productImage->id_category = $request->id_category;
                $productImage->path = 'images/myimg/product_macbook/' . $filename;
                $productImage->save();
            }
        }
        return redirect('admin/macbook');
    }

    /**
     * Display the specified resource.
     */
    public function show(MacBook $macbook)
    {
        return view('frontend/macbook_detail',compact('macbook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MacBook $macbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MacBook $macbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MacBook $macbook)
    {
        $macbook->delete();
        return redirect('admin/macbook');
    }
}
