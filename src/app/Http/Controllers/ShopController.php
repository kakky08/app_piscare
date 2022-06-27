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
}
