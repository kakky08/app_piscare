<?php

namespace App\Http\Controllers;

use App\Target;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon();

        // その月は何日間あるか取得
        $days = $carbon->daysInMonth;

        $year_month = $carbon->year . '-' . $carbon->month;

        return view('target.pages.index', compact('days', 'year_month'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $target = Target::where('user_id', Auth::id())->where('year_month', $request->year_month)->first();

        if(isset($target))
        {
            $target->fill($request->all());
            $target->save();
        }
        else
        {
            Target::create([
                'user_id' => Auth::id(),
                'year_month' => $request->year_month,
                'target' => $request->target,
                'time' => $request->time,
            ]);

        }

        return redirect()->route('target.index');
    }
}
