<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 5);
        $offset = $request->query('offset', 0);
        $ads_query = Ad::latest();
        $filters = [];

        if ($search = $request->query('search')) {
            $ads_query->where('name', 'like', "%$search%");
            $filters['search'] = $search;
        }

        if ($request->has('type')) {
            $type = $request->query('type');
            $ads_query->where('type', $type);
            $filters['type'] = $type;
        }

        if ($location = $request->query('location')) {
            $ads_query->whereHas('location', function ($query) use ($location) {
                return $query->where('address', 'like', "%$location%")
                    ->orWhere('city', 'like', "%$location%")
                    ->orWhere('state', 'like', "%$location%");
            });
            $filters['location'] = $location;
        }

        if ($price_min = $request->query('price_min')) {
            $ads_query->where('price', '>=', $price_min);
            $filters['price_min'] = $price_min;
        }

        if ($price_max = $request->query('price_max')) {
            $ads_query->where('price', '<=', $price_max);
            $filters['price_max'] = $price_max;
        }

        if ($category = $request->query('category')) {
            $ads_query->where('category_id', $category);
            $filters['category'] = $category;
        }

        $ads = $ads_query->simplePaginate(15);

        $categories = Category::all();

        return view('ads', compact('ads', 'categories', 'filters'));
    }

    public function show(Ad $ad)
    {
        $like = Like::where([
            'ad_id' => $ad->id,
            'user_id' => auth()->id(),
        ])->first();

        return view('ad', compact('ad', 'like'));
    }

    public function addLike(Ad $ad)
    {
        return Like::create([
            'ad_id' => $ad->id,
            'user_id' => auth()->id(),
        ]);
    }

    public function removeLike(Ad $ad)
    {
        return Like::where([
            'ad_id' => $ad->id,
            'user_id' => auth()->id(),
        ])->delete();
    }
}
