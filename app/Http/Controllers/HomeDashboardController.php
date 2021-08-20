<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Product;
use Auth;

class HomeDashboardController extends Controller
{
    
    public function index(){
        $productCount = Product::count();
        $userCount = User::count();
        $orderCount = Order::count();
        $blogCount = Blog::count();
        return view('backend.index',['productCount' => $productCount,'userCount' => $userCount
        ,'orderCount' => $orderCount,'blogCount' => $blogCount]);
    }
    public function getLogin(){
        return view('backend.pages.admin.login');
    }
    public function PostLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required' =>' Email không được để trống (*)',
            'email.email' => 'Email không đúng định dạng (*)',
            'password.required' => 'Password không được để trống (*)',
            'password.min' => 'Password quá ngắn phải trên 6 ký tự (*)'
        ]);
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
            'status' => 0,
        ];
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $status = $user->status;
            if($status == 0){
                return redirect()->route('home.dashboard')->with('success','Đăng nhập tài khoản thành công !');
            }
        }else{
            return back()->with('error','Email hoặc Password không đúng !');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login.dashboard.admin')->with('success','Đăng xuất tài khoản thành công !');
    }
}
