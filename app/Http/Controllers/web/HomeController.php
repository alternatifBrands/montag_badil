<?php

namespace App\Http\Controllers\web;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('brands')->get();
        return view('web.pages.home', compact('categories'));
    }
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('web.pages.brand_details', compact('brand'));
    }
}
