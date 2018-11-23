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
                                <h3 class="mb-0">{{$sanpham->ten_sp}}</h3>
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
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Ngày thêm</th>
                            </thead>
                            <tbody>
                            @foreach($sanpham->soluong as $d)
                                <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->so_luong}}</td>
                                <td>{{$d->sizes->size}}</td>
                                <td>{{$d->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                            <input hidden name="id_sanpham" value="{{$sanpham->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Số lượng</label>
                                    <input type="number" name="so_luong" class="form-control"
                                           placeholder="Nhập số lượng" autocomplete="off" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Size</label>
                                    <input type="text" name="size" class="form-control"
                                           autocomplete="off" placeholder="Nhập size" required>
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