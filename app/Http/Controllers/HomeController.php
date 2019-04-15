<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $url_data = [
        array(
          'title' => 'AnvarDev',
          'url' => 'http://127.0.0.1:8000'
        ),
        array(
          'title' => 'bootstrap-3',
          'url' => 'http://bootstrap-3.ru/'
        )
      ];
        return view('home', [
          'url_data' => $url_data
        ]);
    }

    public function getJson()
    {
      return [
        array(
          'title' => 'Google',
          'url' => 'https://www.google.ru/'
        ),
        array(
          'title' => 'Yandex',
          'url' => 'https://yandex.ru/'
        )
      ];
    }

    public function chartData()
    {
      return [
        'labels' => ['февраль','март','апрель','май','июнь'],
        'datasets' => array(
          [
          'label' => 'Сделки',
          'backgroundColor' => '#F26202',
          'data' =>  [10000,15000,5000,10000,30000],
          ])
      ];
    }

    public function chartRandom()
    {
      return [
        'labels' => ['февраль','март','апрель','май','июнь'],
        'datasets' => array(
          [
          'label' => 'Кредитов выдано',
          'backgroundColor' => '#16AB39',
          'data' =>  [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
          ],
          [
          'label' => 'Кредитов выплачено',
          'backgroundColor' => '#B5CC18',
          'data' =>  [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
          ],
        )
      ];
    }
}
