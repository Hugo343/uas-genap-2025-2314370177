<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'orderCount' => Order::count(),
            'recentProducts' => Product::latest()->take(5)->get(),
            'recentOrders' => Order::latest()->take(5)->with('user')->get(),
        ]);
    }
}

