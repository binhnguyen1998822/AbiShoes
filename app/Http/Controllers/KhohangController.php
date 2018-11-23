<?php

namespace App\Http\Controllers;

use App\Dvship;
use App\Hoadon;
use App\Loaiship;
use App\Mausac;
use App\Nguondon;
use App\Sanpham;
use App\Size;
use App\Tonkho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class KhohangController extends Controller
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


        $sanpham = Sanpham::paginate(15);
        $addorder = $this->addorder();
        return view('khohang',compact('cachesearch','sanpham','addorder'));
    }

    public function view($id){
        $sanpham = Sanpham::find($id);

        return view('details.sanpham',compact('sanpham'));
    }


    public function add(Request $request){
        $sanphaam= new Sanpham();
        $sanphaam->ten_sp= $request->ten_sp;
        $sanphaam->ma_sp= $request->ma_sp;
        $sanphaam->gia_nhap= $request->gia_nhap;
        $sanphaam->gia_ban= $request->gia_ban;
        $sanphaam->save();
        return back();
    }

    public function addslsp(Request $request){
        $sanphaam= new Tonkho();
        $sanphaam->id_sanpham= $request->id_sanpham;
        $sanphaam->so_luong= $request->so_luong;
        $sanphaam->size= $request->size;
        $sanphaam->save();
        return back();
    }

    public function addorder(){
        $return_arr = [];
        $return_arr['loai_ship'] = Loaiship::get();
        $return_arr['donvi_ship'] = Dvship::get();
        $return_arr['size'] = Size::get();
        $return_arr['mau_sac'] = Mausac::get();
        $return_arr['kenh_bh'] = Nguondon::get();
        return $return_arr;
    }
}
