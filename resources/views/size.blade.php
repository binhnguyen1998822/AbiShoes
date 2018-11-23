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
                                <h3 class="mb-0">Size</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="testTable" class="table align-items-center table-flush">
                            <thead class="text-primary">
                                <th>STT</th>
                                <th>Kiểu</th>
                                <th>Size</th>
                            </thead>
                            <tbody>
                            @foreach($size as $s)
                                <tr>
                                <td>{{$s->id}}</td>
                                <td>{{$s->type}}</td>
                                <td>{{$s->size}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $size->appends($_GET)->links( "pagination::bootstrap-4") }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>





@endsection