@extends('layouts.header')
@section('content')
    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Hóa đơn</h3>
                            </div>
                            <div class="col text-right">
                                <a data-toggle="modal"
                                   data-target="#exampleModal" class="btn btn-sm btn-primary" style="color: #fff">Thêm
                                    đơn</a>
                                <a href="{{ url('exportdh') }}?datefilter={{$cachesearch->datefilter}}&so_dt={{$cachesearch->so_dt}}&trang_thai={{$cachesearch->trang_thai}}&id_loaiship={{$cachesearch->id_loaiship}}"
                                   class="btn btn-sm btn-primary">Xuất</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="testTable" class="table align-items-center table-flush">
                            <thead class="text-primary">
                            <th>STT</th>
                            <th>Tên KH</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Nguồn</th>
                            <th>Bên giao</th>
                            <th>Mã VD</th>
                            <th>Trạng thái</th>
                            <th>Phí ship</th>
                            <th>Giá bán</th>
                            <th>Ngày tạo</th>
                            <th>Hoàn thành</th>
                            <th>Sửa</th>
                            </thead>
                            <tbody>
                            @foreach($hoadon as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->ten_kh}}</td>
                                    <td>{{$d->so_dt}}</td>
                                    <td style="max-width: 150px">{{$d->dia_chi}}</td>
                                    <td style="max-width: 150px">{{$d->tensp->ten_sp}}</td>
                                    <td>{{$d->sizes->size}}</td>
                                    <td>{{$d->kenhbh->ten_nguon}}</td>
                                    <td>{{$d->dvship->ten_dv}}</td>
                                    <td>{{$d->ma_vd}}</td>
                                    <td>{{$d->trangthai->ten_trangthai}}</td>
                                    <td>{{$d->phi_ship}}</td>
                                    <td>{{number_format($d->gia_ban)}} đ</td>
                                    <td style="max-width: 90px">{{$d->created_at}}</td>
                                    <td style="max-width: 90px">{{$d->updated_at}}</td>
                                    <td><a href="{{ asset('') }}hoadon/{{$d->id}}" class="btn btn-sm btn-primary">Sửa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $hoadon->appends($_GET)->links( "pagination::bootstrap-4") }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm đơn hàng mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data"
                          onsubmit="return checkForm(this);" id="reg_form">
                        <div class="modal-body">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Khách hàng</label>
                                    <input type="text" name="ten_kh" class="form-control"
                                           placeholder="Họ và tên khách hàng" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Số điện thoại</label>
                                    <input type="number" name="so_dt" class="form-control typeaheadphone"
                                           autocomplete="off" placeholder="Nhập số điện thoại" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Địa Chỉ</label>
                                    <input type="text" name="dia_chi" class="form-control"
                                           placeholder="Nơi giao hàng đến " autocomplete="off" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-control-label">Sản phẩm</label>
                                    <select class="form-control" id="select" name="ten_sp">
                                        @foreach($addorder['san_pham'] as $v)
                                            <option value="{{$v->id}}">{{$v->ten_sp}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <label class="form-control-label">Size</label>
                                    <select class="form-control" id="select" name="size">
                                        @foreach($addorder['size'] as $v)
                                            <option value="{{$v->id}}">{{$v->size}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <label class="form-control-label">Màu sắc</label>
                                    <select class="form-control" id="select" name="mau_sac">
                                        @foreach($addorder['mau_sac'] as $v)
                                            <option value="{{$v->id}}">{{$v->mau_sac}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Loại Ship</label>
                                        <select class="form-control" name="id_loaiship">
                                            @foreach($addorder['loai_ship'] as $v)
                                                <option value="{{$v->id}}">{{$v->ten_loaiship}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Kênh bán hàng</label>
                                        <select class="form-control" name="kenh_bh">
                                            @foreach($addorder['kenh_bh'] as $v)
                                                <option value="{{$v->id}}">{{$v->ten_nguon}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Đơn vị Ship</label>
                                        <select class="form-control" id="select" name="dv_ship">
                                            @foreach($addorder['donvi_ship'] as $v)
                                                <option value="{{$v->id}}">{{$v->ten_dv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-control-label">Ghi chú</label>
                                    <textarea name="ghi_chu" class="form-control" placeholder="Ghi lại đỡ quên"
                                              required></textarea>
                                </div>


                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" name="myButton" class="btn btn-success">Thêm đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection