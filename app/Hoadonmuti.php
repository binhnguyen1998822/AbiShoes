<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Hoadonmuti extends Model
{
    protected $table = 'hoa_don_muti';

    public function tensp()
    {
        return $this->belongsTo('App\Sanpham','id_sp','id');
    }
    public function colors()
    {
        return $this->belongsTo('App\Mausac','color','id');
    }
    public function sizes()
    {
        return $this->belongsTo('App\Size','size','id');
    }
}