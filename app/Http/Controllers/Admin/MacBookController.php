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
        $macbook = MacBook::all();
        // return view('admin/product/macbook/index', ['auth' => $auth , 'product' => $product]);
        return view('admin/product/macbook/index', compact('auth','macbook'));
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
        $item = $request->all();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('/admin/macbook/create');
            }
            $imageFile = $file->getClientOriginalName();
            $file->move('images/myimg/product_macbook',$imageFile);
        } else {
            $imageFile = null;
        }
        $item['image'] = 'images/myimg/product_macbook/'.$imageFile;
        MacBook::create($item);
        return redirect('admin/macbook');
    }

    /**
     * Display the specified resource.
     */
    public function show(MacBook $macbook)
    {
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
