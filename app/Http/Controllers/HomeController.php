<?php

namespace App\Http\Controllers;

use App\Models\Ad;

class HomeController extends Controller
{
    public function index()
    {
        $premium_ads = Ad::with('media')->premium()->get();

        return view('welcome', compact('premium_ads'));
    }
}
