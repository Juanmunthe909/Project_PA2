<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%')
                ->paginate(10);
            return view('pages.admin.dashboard.list', compact('products'));
        }
        return view('pages.admin.dashboard.main');
    }
}
