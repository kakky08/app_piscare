<?php

namespace App\Http\Controllers;

use App\Area;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::orderBy('created_at', 'desc')->paginate(20);
        $areas = Area::orderBy('id', 'asc')->get();
        return view('shop.index', compact('shops', 'areas'));
    }

    public function search(Request $request)
    {

        $shops = Shop::when(isset($request->area), function ($query) use ($request)
        {
            return $query->where('area', $request->area);
        })
        ->when(isset($request->keyword), function ($query) use ($request)
        {
            return $query->where('name', 'LIKE', "%$request->keyword%")->orwhere('catch', 'LIKE', "%$request->keyword%");
        })
        ->orderBy('created_at', 'desc')->paginate(20);


        $areas = Area::orderBy('id', 'asc')->get();

        return view('shop.index', compact('shops', 'areas'));
    }
}
