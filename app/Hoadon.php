<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Hoadon extends Model
{
    protected $table = 'hoa_don';
    protected $fillable = ['ten_kh', 'ma_sp', 'gia_ban', 'mau_sac', 'size', 'ten_kh', 'so_dt', 'dia_chi', 'kenh_bh', 'dv_ship', 'id_loaiship', 'ma_vd', 'tinh_trang', 'phi_ship', 'ghi_chu'];

    public function sizes()
    {
        return $this->belongsTo('App\Size','size','id');
    }
    public function trangthai()
    {
        return $this->belongsTo('App\Trangthai','trang_thai','id');
    }
    public function kenhbh()
    {
        return $this->belongsTo('App\Nguondon','kenh_bh','id');
    }
    public function dvship()
    {
        return $this->belongsTo('App\Dvship','dv_ship','id');
    }
    public function tensp()
    {
        return $this->belongsTo('App\Sanpham','ten_sp','id');
    }
    public function color()
    {
        return $this->belongsTo('App\Mausac','mau_sac','id');
    }
}