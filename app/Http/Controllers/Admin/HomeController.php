<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function login()
    {
        return view('admin/login');
    }
    public function checklogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json('successfully');
        };
        return response()->json('error');
    }
    public function dashboard()
    {
        $auth = Auth::user();
        return view('admin/dashboard', ['auth' => $auth]);
    }
    public function editprofile()
    {
        $auth = Auth::user();
        $createdAt = $auth->created_at->format('d/m/Y H:i:s');
        $updatedAt = $auth->updated_at->format('d/m/Y H:i:s');
        return view('admin/editprofile', ['auth' => $auth, 'createdAt' => $createdAt, 'updatedAt' => $updatedAt]);
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return view('admin/login');
    }
}
