@extends('layouts.header')
@section('content')
    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Hóa đơn</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">{{$hoadon->trangthai->ten_trangthai}}</a>
                                <a class="btn btn-sm btn-primary" href="#" onclick="javascript:window.print();">
                                    <i class="fa fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off"
                              onsubmit="return checkForm(this);">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Thông tin khách hàng</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Họ tên</label>
                                            <input type="text" id="input-username"
                                                   class="form-control form-control-alternative" placeholder="Username"
                                                   disabled value="{{$hoadon->ten_kh}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Số điện thoại</label>
                                            <input type="number" id="input-email"
                                                   class="form-control form-control-alternative"
                                                   value="{{$hoadon->so_dt}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">Địa chỉ</label>
                                            <input type="text" id="input-first-name"
                                                   class="form-control form-control-alternative"
                                                   placeholder="First name" value="{{$hoadon->dia_chi}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h6 class="heading-small text-muted mb-4">Thông tin Hàng hóa</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Sản phẩm</label>
                                            <input type="text" id="input-username"
                                                   class="form-control form-control-alternative" placeholder="Username"
                                                   disabled value="{{$hoadon->tensp->ten_sp}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Size</label>
                                            <input type="number" id="input-email"
                                                   class="form-control form-control-alternative"
                                                   value="{{$hoadon->sizes->size}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Màu sắc</label>
                                            <input type="text" id="input-email"
                                                   class="form-control form-control-alternative"
                                                   value="{{$hoadon->color->mau_sac}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">Giá bán</label>
                                            <input type="text" id="input-first-name"
                                                   class="form-control form-control-alternative"
                                                   placeholder="First name"
                                                   value="{{number_format($hoadon->gia_ban)}} đ" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">Thông tin giao hàng</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Nơi tiếp nhận</label>
                                            <select class="form-control" id="select" name="dv_ship">
                                                @foreach($unity['donvi_ship'] as $v)
                                                    <option value="{{$v->id}}" @if($v->id ==$hoadon->dv_ship ) selected @endif>{{$v->ten_dv}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">Mã vận đơn</label>
                                            <input type="text" id="input-first-name" name="ma_vd"
                                                   class="form-control form-control-alternative"
                                                   value="{{$hoadon->ma_vd}}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">Phí giao hàng</label>
                                            <input type="number" id="input-first-name" autocomplete="off" name="phi_ship"
                                                   class="form-control form-control-alternative"
                                                   value="{{$hoadon->phi_ship}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">Thông tin bỏ xung</h6>
                            <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label>Ghi chú</label>
                                    <textarea rows="4" class="form-control form-control-alternative">{{$hoadon->ghi_chu}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 float-right">
                                <label>Hành động</label>
                                <select class="form-control form-control-alternative" id="select" name="trang_thai">
                                    @foreach($trangthai as $v)
                                        <option value="{{$v->id}}"
                                                @if($v->id ==$hoadon->trang_thai ) selected @endif>{{$v->ten_trangthai}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input class="btn btn-primary float-right" type="submit" name="myButton"
                                       value="Cập nhập">

                            </div>


                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection