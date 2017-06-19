<?php

namespace App\Http\Controllers;

use App\Statistics;
use Illuminate\Support\Facades\DB;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * метод для вывода страницы
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page1(){

        $statistics = DB::table('statistics')
            ->limit(5)
            ->get();

        $statistic = Statistics::find(5);

        // Ось X для графика
        $route = array_keys(json_decode($statistic->route, true));

        // Ось Y для графика
        $total = array_values(json_decode($statistic->route, true));

        JavaScriptFacade::put([
            'route' => $route,
            'total' => $total
        ]);
        return view('page1', compact(['statistics']));
    }


    /**
     * метод для вывода страницы
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page2()
    {
        return view('page2');
    }
}
