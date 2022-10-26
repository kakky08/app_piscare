<?php

namespace App\Http\Controllers;

use App\Post;
use App\Record;
use App\Target;
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
        $carbon = new Carbon();
        // その月は何日間あるか取得
        $days = (int)$carbon->daysInMonth;
        // 目標、目標回数の取得
        $target = Target::where('user_id', Auth::id())->orderBy('created_at', 'desc')->select('time', 'target')->first();

        // 目標、目標回数が未設定な場合の分岐
        if(isset($target))
        {
            $time = $target->time;
            $title = $target->target;
        }
        else
        {
            $time = 0;
            $title = "目標を設定してください";
        }


        // 現在の年月の情報を取得
        $year_month = $carbon->year . '-' . $carbon->month;

        // 現在の年月の記録の数を検索
        $count = Record::where('user_id', Auth::id())->where('year_month', $year_month)->count();


        // 目標回数が現在の月の日数より多ければ最大値に調整
        if($time > $days)
        {
            $time = $days;
        }


        // 今月の目標の達成率のパーセンテージを計算
        // 目標日数が０日の場合計算を実行しない
        if($time !== 0)
        {
            $percent = ($count / $time) * 100;
            $percent = round($percent, 1);
        }
        else
        {
            $time = 0;
            $percent = 0;
        }

        // レシピからランダムに１件取得
        $recommendation = Post::inRandomOrder()->first();

        // レシピの数を調べ最大5件取得できるように調整
        $count = Post::count();
        if($count < 5)
        {
            $latests = Post::orderBy('id', 'desc')->get();
        }
        else
        {
            // レシピから最新のものを５件取得
            $latests = Post::orderBy('id', 'desc')->take(5)->get();
        }


        return view('home.pages.index', compact('time', 'percent', 'title', 'count', 'recommendation', 'latests'));
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


        return view('mypage.home.index', compact('dates',  'date', 'year_month', 'record_year_month', 'record_day', 'year', 'month', 'record', 'array'));
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
