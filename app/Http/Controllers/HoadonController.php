<?php

namespace App\Http\Controllers;

use App\Dvship;
use App\Hoadon;
use App\Hoadonmuti;
use App\Loaiship;
use App\Mausac;
use App\Nguondon;
use App\Sanpham;
use App\Size;
use App\Trangthai;
use Illuminate\Http\Request;

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
        $cachesearch = $request;
        $hoadon = Hoadon::orderBy('id', 'desc')->paginate(15);
        $addorder = $this->addorder();
        return view('hoadon', compact('cachesearch', 'hoadon', 'addorder'));
    }

    public function show($id)
    {

        $unity = $this->addorder();
        $trangthai= Trangthai::get();
        $hoadon = Hoadon::find($id);
        return view('details.hoadon', compact( 'hoadon','trangthai','unity'));
    }

    public function edit($id,Request $request){
        $hoadon = Hoadon::find($id);
        $hoadon->trang_thai = $request->trang_thai;
        $hoadon->dv_ship = $request->dv_ship;
        $hoadon->ma_vd = $request->ma_vd;
        $hoadon->phi_ship = $request->phi_ship;
        $hoadon->save();
        return back();
    }

    public function add(Request $request)
    {

        $sanpham = Sanpham::find($request->ten_sp);
        $add = new Hoadon();
        $add->trang_thai= 1;
        $add->fill($request->except('_token'));
        $add->save();


        //
        $name =  $request->ten_sp;
        $description =  $request->ten_sp;

        if(count($name) > count($description))
            $count = count($description);
        else $count = count($name);


        for($i = 0; $i < $count; $i++){
            $sanpham = Sanpham::find($request->ten_sp[$i]);
            $detail = new Hoadonmuti();
            $detail->id_hd= $add->id;
            $detail->id_sp = $request->ten_sp[$i];
            $detail->size = $request->size[$i];
            $detail->color = $request->mau_sac[$i];
            $detail->so_luong = $request->so_luong[$i];
            $detail->gia_ban = $sanpham->gia_ban;
            $detail->gia_nhap = $sanpham->gia_nhap;
            $detail->save();
        }


        return back();

    }

    public function addorder()
    {
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
