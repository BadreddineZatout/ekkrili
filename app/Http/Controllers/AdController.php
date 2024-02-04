<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 5);
        $offset = $request->query('offset', 0);
        $ads_query = Ad::latest();

        if ($search = $request->query('search')) {
            $ads_query->where('name', 'like', "%$search%");
        }

        if ($type = $request->query('type')) {
            $ads_query->where('type', $type);
        }

        if ($location = $request->query('location')) {
            $ads_query->whereHas('location', function ($query) use ($location) {
                return $query->where('address', 'like', "%$location%")
                    ->orWhere('city', 'like', "%$location%")
                    ->orWhere('state', 'like', "%$location%");
            });
        }

        if ($price = $request->query('price')) {
            $ads_query->where('price', '<=', $price);
        }

        $ads = $ads_query->paginate(5);
        return view('ads', compact('ads'));
    }
}
