<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = Auth::user();

        $dateStr = Carbon::now()->format("Y-m-01");
        $date = new Carbon($dateStr);
        $year_month = substr($dateStr, 0, 7);
        $year = $date->year;
        $month = $date->month;

        $record_year_month = substr($dateStr, 0, 7);
        $today = new Carbon('today');
        $record_day = (int)$today->day;

        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);

        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        // 表示されている月の記録を取得
        // $records = Record::where('user_id', Auth::id())->where('year_month', $year_month)->select('day', 'flag_count')->get()->toArray();
        // dd($records);
        // $array = array_column($records, 'flag_count', 'day');

        // その日の記録があるかを検索
        $today = new Carbon('today');
        $day = $today->day;

        // $record = Record::where('user_id', Auth::id())->where('year_month', $record_year_month)->where('day', $record_day)->first();

        /* $action = 'store';
        if ($record) {
            $action =  'update';
        } */


        return view('mypage.home.index', compact('dates',  'date', 'year_month', 'year', 'month', 'record_year_month', 'record_day'));
    }
}
