<?php

namespace App\Http\Controllers;

use App\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $count = ceil($count / 7) * 7 + 7;


        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        // 表示されている月の記録を取得
        $records = Record::where('user_id', Auth::id())->where('year_month', $year_month)->select('day', 'count')->get()->toArray();
        // カレンダーに表示するため配列に格納
        $array = array_column($records, 'count', 'day');

        // その日の記録があるかを検索
        $today = new Carbon('today');
        $day = $today->day;
        $record = Record::where('user_id', Auth::id())->where('year_month', $record_year_month)->where('day', $record_day)->first();

        return view('mypage.home.index', compact('dates',  'date', 'year_month', 'year', 'month', 'record', 'record_year_month', 'record_day', 'array'));

    }


    /**
     * 記録機能
     */
    public function record(Request $request)
    {
        $year_month = $request->year_month;
        $day = $request->day;
        $record = Record::where('user_id', Auth::id())->where('year_month', $year_month)->where('day', $day)->first();
        //更新処理
        if (isset($record)) {
            if (isset($request->breakfast)) {
                $record->is_breakfast ?   $record->count -= 1 : $record->count += 1;
                $record->is_breakfast ?  $record->is_breakfast = false : $record->is_breakfast = true;
            }
            if (isset($request->lunch)) {
                $record->is_lunch ?   $record->count -= 1 : $record->count += 1;
                $record->is_lunch ?  $record->is_lunch = false : $record->is_lunch = true;
            }
            if (isset($request->dinner)) {
                $record->is_dinner ?   $record->count -= 1 : $record->count += 1;
                $record->is_dinner ?  $record->is_dinner = false : $record->is_dinner = true;
            }
            if ($record->count === 0) {
                $record->destroy($record->id);
            }
            $record->save();
        } else {
            $record = new Record();
            $record->user_id = Auth::id();
            $record->year_month = $year_month;
            $record->day = $day;
            if (isset($request->breakfast)) {
                $record->is_breakfast = true;
            }
            if (isset($request->lunch)) {
                $record->is_lunch = true;
            }
            if (isset($request->dinner)) {
                $record->is_dinner = true;
            }
            $record->count = 1;
            $record->save();
        }
        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }


    /**
     * 月の移動
     * @param $move
     */
    public function moveMonth($move)
    {
        $dateStr = sprintf('%s-01', $move);

        $date = new Carbon($dateStr);

        $year_month = substr($dateStr, 0, 7);

        $year = $date->year;
        $month = $date->month;

        $record_year_month = substr($dateStr, 0, 7);
        $today = new Carbon('today');
        $record_day = $today->day;

        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);

        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;

        $count = ceil($count / 7) * 7 + 7;

        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        // 表示されている月の記録を取得
        $records = Record::where('user_id', Auth::id())->where('year_month', $record_year_month)->select('day', 'count')->get()->toArray();

        // カレンダーに表示するため配列に格納
        $array = array_column($records, 'count', 'day');


        // その日の記録があるかを検索
        $today = new Carbon('today');
        $day = $today->day;
        $record = Record::where('user_id', Auth::id())->where('year_month', $record_year_month)->where('day', $record_day)->first();


        return view('mypage.home.index', compact('dates',  'date', 'year_month', 'record_year_month', 'record_day', 'year', 'month', 'record','array'));
    }


    /**
     * 日付選択機能
     * @param $select
     */
    public function selectDay($select)
    {

        $user = Auth::user();

        $year_month = substr($select, 0, 7);

        $dateStr = sprintf('%s-01', $year_month);

        $date = new Carbon($dateStr);

        $year = $date->year;
        $month = $date->month;

        $record_year_month = substr($select, 0, 7);
        $record_day = substr($select, 8);


        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);

        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7 + 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        // 表示されている月の記録を取得
        $records = Record::where('user_id', Auth::id())->where('year_month', $year_month)->select('day', 'count')->get()->toArray();
        // カレンダーに表示するために配列に格納
        $array = array_column($records, 'count', 'day');

        // その日の記録があるかを検索
        $record = Record::where('user_id', Auth::id())->where('year_month', $record_year_month)->where('day', $record_day)->first();

        $action = 'store';
        if ($record) {
            $action =  'update';
        }



        return view('mypage.home.index', compact('dates', 'user', 'date', 'year_month', 'year', 'month', 'record_year_month', 'record_day', 'action', 'array', 'select', 'record'));
    }

}
