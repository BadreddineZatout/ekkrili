<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 20);
        $offset = $request->query('offset', 0);
        $ads_query = Ad::latest();
        $ads = $ads_query->offset($offset * $limit)->limit($limit)->get();

        return view('ads', compact('ads'));
    }
}
