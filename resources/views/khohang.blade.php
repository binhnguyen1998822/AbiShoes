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
                                <h3 class="mb-0">Kho hàng</h3>
                            </div>
                            <div class="col text-right">
                                <a data-toggle="modal"
                                   data-target="#exampleModal" class="btn btn-sm btn-primary" style="color: #fff">Thêm
                                    hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="testTable" class="table align-items-center table-flush">
                            <thead class="text-primary">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã SP</th>
                                <th>Giá nhập</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Ngày tạo</th>
                                <th>Chi tiết</th>
                            </thead>
                            <tbody>
                            @foreach($sanpham as $d)
                                <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->ten_sp}}</td>
                                <td>{{$d->ma_sp}}</td>
                                <td>{{number_format($d->gia_nhap)}} đ</td>
                                <td>{{number_format($d->gia_ban)}} đ</td>
                                <td>{{$d->soluong->sum('so_luong')-$d->hoadon->sum('so_luong')}}</td>
                                <td>{{$d->created_at}}</td>
                                <td><a href="tonkho/{{$d->id}}">Xem</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $sanpham->appends($_GET)->links( "pagination::bootstrap-4") }}
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
                                    <label class="form-control-label">Tên sản phẩm</label>
                                    <input type="text" name="ten_sp" class="form-control"
                                           placeholder="Sản phẩm" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Mã sản phẩm</label>
                                    <input type="text" name="ma_sp" class="form-control"
                                           autocomplete="off" placeholder="Nhập mã sản phẩm" required>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="form-control-label">Giá nhập</label>
                                    <input type="text" name="gia_nhap" class="form-control"
                                           placeholder="Nhập đầy đủ số tiền" autocomplete="off" required>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Giá bán</label>
                                    <input type="text" name="gia_ban" class="form-control"
                                           placeholder="Nhập đầy đủ số tiền" autocomplete="off" required>
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