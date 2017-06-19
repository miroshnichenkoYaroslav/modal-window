<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
//use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsMiddleware
{

    protected $key = null;

    /**
     * Считаем количество заходов на страницу и сохраняем в кеш
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->url();
        $key = 'statistics';
        $cache = Cache::has($key) ? Cache::get($key) : [];
        $this->incrementUrl($url, $cache);
        Cache::put($key, $cache, 60);

        return $next($request);
    }

    /**
     *
     * @param $url
     * @param array $cache
     */
    public function incrementUrl($url, array &$cache)
    {
        $value = array_get($cache, $url, 0);
        $cache[$url] = $value + 1;
    }
}




// 1. Достать массив из кеша
// 2. Обновить значение по ключу

/*if (Cache::get('statistics') === null) {
            dd('null');
            $key = 'statistics';

            $statistics = [
                "http://laravel2/page1" => 0,
                "http://laravel2/page2" => 0
            ];
            Cache::put($key, $statistics, 10);
        } else {
            $statistics = Cache::get('statistics');
            $url = $request->url();
            if (array_key_exists($url, $statistics)) {
                $statistics[$url] += 1;
            } else {
                $statistics[$url] = 1;
            }
            $var = Cache::get('statistics');
            dump($var);
                //$statistics[$request->url()]++;
            //dd($statistics);
        }*/
