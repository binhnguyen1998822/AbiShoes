<?php

namespace App\Http\Controllers;

use App\Hoadon;
use App\Trangthai;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $trangthai= Trangthai::get();
        $analytics =$this->analytics($datefilter);
        $chartcount =$this->chartcount($datefilter);
        $chartprofit =$this->chartprofit($datefilter);
        return view('home',compact('analytics','chartcount','trangthai','chartprofit'));
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

    public function chartcount($datefilter){
        $trangthai= Trangthai::get();
        $tg = explode(" - ", $datefilter);

        $begin = new DateTime($tg[0]);
        $end = new DateTime($tg[1]);
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);


        $return_arr = [];
        $tt = [];
        $tt_cnt=[];
        $return_arr['date'] = '';

        foreach ($trangthai as $t){
            $return_arr['tt'.$t->id] = '';
            $tt[$t->id]= DB::table('hoa_don')
                ->where('trang_thai', $t->id)
                ->selectRaw('date(created_at) as day, count(id) as total')
                ->groupby('day')
                ->pluck('total', 'day');
        }


        foreach ($daterange as $date) {
            $month = $date->format("Y-m-d");
            foreach ($trangthai as $t){
            $tt_cnt[$t->id] = (isset($tt[$t->id][$month]) ? $tt[$t->id][$month] : 'null');


            $return_arr['tt'.$t->id] .= $tt_cnt[$t->id] . ',';
            }

            $return_arr['date'] .= '"' . ($month) . '",';
        }

        foreach ($trangthai as $t){
            $return_arr['tt'.$t->id] = '[' . rtrim($return_arr['tt'.$t->id], ',') . ']';
        }
        $return_arr['date'] = '[' . rtrim($return_arr['date'], ',') . ']';

        return $return_arr;
    }

    public function chartprofit($datefilter){
        $trangthai= Trangthai::get();
        $tg = explode(" - ", $datefilter);

        $begin = new DateTime($tg[0]);
        $end = new DateTime($tg[1]);
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);


        $return_arr = [];
        $tt = [];
        $tt_cnt=[];
        $return_arr['date'] = '';

        foreach ($trangthai as $t){
            $return_arr['tt'.$t->id] = '';
            $tt[$t->id]= DB::table('hoa_don')
                ->where('trang_thai', $t->id)
                ->selectRaw('date(created_at) as day, sum(gia_ban - gia_nhap) as total')
                ->groupby('day')
                ->pluck('total', 'day');
        }


        foreach ($daterange as $date) {
            $month = $date->format("Y-m-d");
            foreach ($trangthai as $t){
                $tt_cnt[$t->id] = (isset($tt[$t->id][$month]) ? $tt[$t->id][$month] : 'null');


                $return_arr['tt'.$t->id] .= $tt_cnt[$t->id] . ',';
            }

            $return_arr['date'] .= '"' . ($month) . '",';
        }

        foreach ($trangthai as $t){
            $return_arr['tt'.$t->id] = '[' . rtrim($return_arr['tt'.$t->id], ',') . ']';
        }
        $return_arr['date'] = '[' . rtrim($return_arr['date'], ',') . ']';

        return $return_arr;
    }
}
