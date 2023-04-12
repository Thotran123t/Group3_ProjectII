<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerInterfaceController extends Controller
{
    public function home(){
        return view('frontend/home');
    }
    public function shop(){
        return view('frontend/shop');
    }
    public function blog(){
        return view('frontend/blog');
    }
    public function about(){
        return view('frontend/about');
    }
    public function contact(){
        return view('frontend/contact');
    }
    public function cart(){
        if(session()->has('user')){
            return view('frontend/cart');
        }
        else{
            return view('frontend/sign_in');
        }
    }
    public function sign_in(){
        return view('frontend/sign_in');
    }
    public function sign_up(){
        return view('frontend/sign_up');
    }


    public function create_user(Request $request){
        $customer = Customer::firstOrCreate(['email' => $request->email], [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
        ]);
    }
    public function signin_user(Request $request){

    }
}
