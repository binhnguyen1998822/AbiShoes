<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Sanpham extends Model
{
    protected $table = 'san_pham';

    public function soluong()
    {
        return $this->hasMany('App\Tonkho','id_sanpham','id');
    }

    public function hoadon()
    {
        return $this->hasMany('App\Hoadonmuti','id_sp','id');
    }
    public function sizes()
    {
        return $this->belongsTo('App\Size','size','id');
    }
}