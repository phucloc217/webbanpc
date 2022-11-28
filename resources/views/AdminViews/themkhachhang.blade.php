@extends('AdminViews/Template/AdminTemplate')
@section('khachhang')
    active
@endsection
@section('title')
    Thêm khách hàng
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm khách hàng </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("admin")}}">Trang chủ</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/admin/khachhang') }}">Khách hàng</a></li>
                        <li class="breadcrumb-item active">Thêm khách hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('err-msg'))
                <div class="alert alert-danger">
                    {{ session()->get('err-msg') }}
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm khách hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/khachhang/them" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="hoten"
                                        placeholder="Tên khách hàng" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="exampleInputEmail1" name="sdt"
                                        placeholder="Tên người dùng" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <textarea class="form-control" name="diachi" id="" cols="30" rows="5" placeholder="Địa chỉ"></textarea>
                                </div> 
                                <div class="card-footer">
                                    <button type="submit" name="them" class="btn btn-primary">Lưu</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{ url('adminAsset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
