<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $premium_ads = Ad::premium()->get();

        return view('welcome', compact('premium_ads'));
    }
}
