<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Tonkho extends Model
{
    protected $table = 'ton_kho';

    public function sizes()
    {
        return $this->belongsTo('App\Size','size','id');
    }

}