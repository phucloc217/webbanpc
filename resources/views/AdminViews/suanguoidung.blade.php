@extends('AdminViews/Template/AdminTemplate')
@section('nguoidung')
    active
@endsection
@section('title')
Sửa thông tin
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin người dùng </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("admin")}}">Trang chủ</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/admin/nguoidung') }}">Người dùng</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin người dùng</li>
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
                            <h3 class="card-title">Sửa thông tin người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/nguoidung/chinhsua/{{$data[0]->id}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã người dùng</label>
                                    <input type="text" class="form-control disable" id="exampleInputEmail1" name="id"
                                        placeholder="Mã người dùng" value="{{$data[0]->id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên người dùng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="hoten"
                                        placeholder="Tên người dùng" value="{{$data[0]->tenuser}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        placeholder="Email" value="{{$data[0]->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="exampleInputEmail1" name="sdt"
                                        placeholder="Tên người dùng" value="{{$data[0]->sdt}}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control disable" id="exampleInputEmail1" name="username"
                                        placeholder="Username" value="{{$data[0]->username}}" disabled>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="luu" class="btn btn-primary">Lưu</button>
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
