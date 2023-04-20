<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Color;

use App\Models\MacBook;
use App\Models\AppWatch;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class CustomerInterfaceController extends Controller
{
    public function home()
    {
        $category = Category::all();
        $product = Product::all();
        $macbook = MacBook::all();
        $appwatch = AppWatch::all();
        return view('frontend/home', compact('category', 'product', 'macbook', 'appwatch'));
    }
    public function shop()
    {
        $product = Product::all();
        $macbook = MacBook::all();
        // $appwatch = AppWatch::all();
        return view('frontend/shop', compact('product', 'macbook'));
    }
    public function about()
    {
        return view('frontend/about');
    }
    public function contact()
    {
        return view('frontend/contact');
    }



    public function myaccount()
    {
        if (session()->has('user')) {
            return view('frontend/profile');
        } else {
            return view('frontend/myaccount');
        }
    }

    public function create_user(Request $request)
    {
        // $password = Hash::make($request->password);

        $customer = Customer::firstOrCreate(['email' => $request->email], [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => "images/myimg/admin/logo-user-default.png",
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            // 'password' => $password,
        ]);

        if ($customer->wasRecentlyCreated) {
            $name = $request->first_name . ' ' . $request->last_name;


            Mail::send('frontend.sendmail', compact('name'), function ($email) use ($request) {
                $email->to($request->email)->subject('Email from IShopApple');
            });

            return redirect('frontend/myaccount');
        } else {
            return redirect('frontend/create_user');
        }
    }

    public function signin_user(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $customer = Customer::where('email', $email)->first();
        //$customer && Hash::check($password, $customer->password)
        if ($customer && $customer->password == $password) { //sucess
            session()->put('user', $customer);
            return view('frontend/profile');
        } else { //error
            return view('frontend/myaccount');
        }
    }

    public function signout_user(Request $request)
    {
        if (session()->has('user')) {
            session()->forget('user');
            return view('frontend/myaccount');
        }
    }



    public function cart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            return view('frontend/cart', compact('cart'));
        }
        return view('frontend/cart');
    }


    public function checkout(Request $request)
    {
        if (session()->has('user')) {
            $user = $request->session()->get('user');
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');
            }
            return view('frontend/checkout', compact('user','cart'));
        } else {
            return view('frontend/myaccount');
        }
    }




    ///////////////////
    public function product_detail($id)
    {
        $product = Product::find($id);
        return view('frontend/product_detail', compact('product'));
    }
    public function macbook_detail($id)
    {
        $macbook = MacBook::find($id);
        return view('frontend/macbook_detail', compact('macbook'));
    }

    public function category_detail($cateid, $catename)
    {
        $category = Category::find($cateid);
        $images = $category->images; // Lấy tất cả các bản ghi từ bảng images có category_id là 1
        if (strpos($catename, 'Iphone') !== false) {
            $product = $category->product;
            return view('frontend/category_product_detail', compact('images', 'catename', 'cateid', 'product'));
        } elseif (strpos($catename, 'MacBook') !== false) {
            return view('frontend/category_macbook_detail');
        } elseif (strpos($catename, 'AppWatch') !== false) {
            return view('frontend/category_appwatch_detail');
        }
    }




    public function add_to_cart(Request $request)
    {

        if (strpos($request->category, 'Iphone') !== false) {
            if (isset($request->color) && isset($request->ram) && isset($request->capacity)) {
                // return response()->json(['info' => 'bycate']);

                $products = Product::where('id_color', $request->color)
                    ->where('id_ram', $request->ram)
                    ->where('id_capacity', $request->capacity)
                    ->where('id_category', $request->category_id)
                    ->get();
                if (count($products) == 0) {
                    return response()->json(['info' => 'san pham dang het hang']);
                } else {
                    $product = $products->first();
                }
            } else {
                $product = Product::find($request->id);
            }
        } elseif (strpos($request->category, 'MacBook') !== false) {
            $product = MacBook::find($request->id);
        } elseif (strpos($request->category, 'AppWatch') !== false) {
            $product = AppWatch::find($request->id);
        }


        $quantity = $request->quantity;
        $cartItem = new CartItem($product, $quantity);


        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            foreach ($cart as $item) {
                if ($item->product->id == $cartItem->product->id && $item->product->id_category == $cartItem->product->id_category) {
                    // Nếu sản phẩm đã tồn tại, cộng dồn quantity vào sản phẩm đó
                    $item->quantity += $cartItem->quantity;
                    $request->session()->put('cart', $cart);
                    return response()->json(['info' => 'Add To Cart Successful !']);
                }
            }
        }
        // Nếu sản phẩm chưa tồn tại, thêm nó vào giỏ hàng
        $cart[] = $cartItem;
        //luu lai bien session
        $request->session()->put('cart', $cart);
        return response()->json(['info' => 'Add To Cart Successful !']);
    }


    public function update_cart(Request $request)
    {
        $quantity = $request->qty;
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            foreach($cart as $index => $item){
                $item->quantity = $quantity[$index];
            }
            $request->session()->put('cart', $cart);
            $cart = $request->session()->get('cart');
            return view('frontend/cart', compact('cart'));
        }
    }



    public function remove_cart(Request $request, $index)
    {
        $cart = session()->get('cart');
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', $cart);
        }
        return redirect('frontend/cart');
    }






    public function view_cart(Request $request)
    {
        dd($request->session()->get('cart'));
    }

    public function delete_cart(Request $request)
    {
        $request->session()->forget('cart');
    }
}
