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

class SizeController extends Controller
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


        $size = Size::paginate(15);
        return view('size',compact('size'));
    }


}
