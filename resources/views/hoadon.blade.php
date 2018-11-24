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
                            <th>Bên giao</th>
                            <th>Mã VD</th>
                            <th>Phí ship</th>
                            <th>Trạng thái</th>
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
                                    <td>{{ isset($d->dvship) ? $d->dvship->ten_dv : '' }}</td>
                                    <td>{{$d->ma_vd}}</td>
                                    <td>{{$d->phi_ship}}</td>
                                    <td>{{$d->trangthai->ten_trangthai}}</td>
                                    <td style="max-width: 90px">{{$d->created_at}}</td>
                                    <td style="max-width: 90px">{{$d->updated_at}}</td>
                                    <td><a href="{{ asset('') }}hoadon/{{$d->id}}"
                                           class="btn btn-sm btn-primary">Sửa</a></td>
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
                            <h6 class="heading-small text-muted mb-4">Thông tin khách hàng</h6>
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
                                <div class="col-md-12">
                                    <label class="form-control-label">Địa Chỉ</label>
                                    <input type="text" name="dia_chi" class="form-control"
                                           placeholder="Nơi giao hàng đến " autocomplete="off" required>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">Thông tin hóa đơn</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table align-items-center table-flush" id="dynamic_field">
                                        <thead class="text-primary">
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Size</th>
                                        <th>Màu sắc</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>

                                        <td><select class="form-control" id="select" name="ten_sp[]">
                                                @foreach($addorder['san_pham'] as $v)
                                                    <option value="{{$v->id}}">{{$v->ten_sp}}</option>
                                                @endforeach
                                            </select></td>
                                        <td><input style="width: 80px;" type="number" min="1" name="so_luong[]"
                                                   class="form-control"
                                                   value="1" placeholder="Số lượng" autocomplete="off"></td>
                                        <td><select class="form-control" id="select" name="size[]">
                                                @foreach($addorder['size'] as $v)
                                                    <option value="{{$v->id}}">{{$v->size}}</option>
                                                @endforeach
                                            </select></td>
                                        <td><select class="form-control" id="select" name="mau_sac[]">
                                                @foreach($addorder['mau_sac'] as $v)
                                                    <option value="{{$v->id}}">{{$v->mau_sac}}</option>
                                                @endforeach
                                            </select></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Thêm</button></td>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-success">Thêm đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                var i=1;

                $('#add').click(function(){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" id="select" name="ten_sp[]">@foreach($addorder['san_pham'] as $v)<option value="{{$v->id}}">{{$v->ten_sp}}</option>@endforeach</select></td><td><input style="width: 80px;" type="number" min="1" name="so_luong[]"class="form-control"value="1" placeholder="Số lượng" autocomplete="off"></td><td><select class="form-control" id="select" name="size[]">@foreach($addorder['size'] as $v)<option value="{{$v->id}}">{{$v->size}}</option>@endforeach</select></td><td><select class="form-control" id="select" name="mau_sac[]">@foreach($addorder['mau_sac'] as $v)<option value="{{$v->id}}">{{$v->mau_sac}}</option>@endforeach</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                });

                $(document).on('click', '.btn_remove', function(){
                    var button_id = $(this).attr("id");
                    $('#row'+button_id+'').remove();
                });





            });
        </script>

@endsection