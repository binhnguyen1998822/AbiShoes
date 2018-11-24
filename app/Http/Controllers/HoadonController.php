<?php

namespace App\Http\Controllers;

use App\Dvship;
use App\Hoadon;
use App\Loaiship;
use App\Mausac;
use App\Nguondon;
use App\Sanpham;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HoadonController extends Controller
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
        $cachesearch =$request;


        $hoadon = Hoadon::orderBy('id','desc')->paginate(15);
        $addorder = $this->addorder();
        return view('hoadon',compact('cachesearch','hoadon','addorder'));
    }


    public function add(Request $request){

        $sanpham = Sanpham::find($request->ten_sp);

        $hoadon= new Hoadon();
        $hoadon->ten_sp= $request->ten_sp;
        $hoadon->ten_kh= $request->ten_kh;
        $hoadon->so_dt= $request->so_dt;
        $hoadon->dia_chi= $request->dia_chi;
        $hoadon->size= $request->size;
        $hoadon->mau_sac= $request->mau_sac;
        $hoadon->id_loaiship= $request->id_loaiship;
        $hoadon->dv_ship= $request->dv_ship;
        $hoadon->ghi_chu= $request->ghi_chu;
        $hoadon->gia_ban= $sanpham->gia_ban;
        $hoadon->gia_nhap= $sanpham->gia_nhap;
        $hoadon->kenh_bh= $request->kenh_bh;
        $hoadon->trang_thai= 1;
        $hoadon->save();
        return back();

    }

    public function addorder(){
        $return_arr = [];
        $return_arr['loai_ship'] = Loaiship::get();
        $return_arr['donvi_ship'] = Dvship::get();
        $return_arr['size'] = Size::get();
        $return_arr['mau_sac'] = Mausac::get();
        $return_arr['kenh_bh'] = Nguondon::get();
        $return_arr['san_pham'] = Sanpham::get();
        return $return_arr;
    }
}
