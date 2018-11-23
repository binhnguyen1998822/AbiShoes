<?php

namespace App\Http\Controllers;

use App\Hoadon;
use DateInterval;
use DatePeriod;
use DateTime;
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
    public function index(Request $request)
    {

        $datefilter = $request->datefilter;
        if ($datefilter == null) {
            $datefilter = date("Y/m/1 0:00:00") . ' - ' . date("Y/m/d H:i:s");
            $tg = explode(" - ", $datefilter);
        } else {
            $tg = explode(" - ", $datefilter);
        }

        $analytics =$this->analytics($datefilter);
        return view('home',compact('analytics'));
    }

    public function analytics($datefilter){

        $tg = explode(" - ", $datefilter);

        $begin = new DateTime($tg[0]);
        $end = new DateTime($tg[1]);
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        $return_arr = [];
        $return_arr['tong_don'] = Hoadon::whereBetween('created_at', $tg)->count();
        $return_arr['doanh_thu'] = Hoadon::whereBetween('created_at', $tg)->sum('gia_ban');
        $return_arr['loi_nhuan'] = Hoadon::whereBetween('created_at', $tg)->selectRaw('sum(gia_ban - gia_nhap) as profit')
            ->first();;
        return $return_arr;
    }

    public function chart(){

    }
}
