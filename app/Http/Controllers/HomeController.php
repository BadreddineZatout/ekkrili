<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $premium_ads = Ad::with('media')->premium()->get();
        $last_sales = Ad::with(['media', 'location'])->sale()->latest()->limit(20)->get();
        $last_rentals = Ad::with(['media', 'location'])->renting()->latest()->limit(20)->get();
        $categories = Category::all();

        return view('welcome', compact('premium_ads', 'last_sales', 'last_rentals', 'categories'));
    }
}
