@extends('AdminViews/Template/AdminTemplate')
@section('sanpham')
    active
@endsection
@section('title')
    Thêm sản phẩm
@endsection
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/admin/sanpham') }}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
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
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/sanpham/them" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="tensp"
                                        placeholder="Tên sản phẩm" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CPU</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="cpu"
                                        placeholder="CPU" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RAM</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="ram"
                                        placeholder="RAM" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Card</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="card"
                                        placeholder="Card" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ổ cứng</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="ocung"
                                        placeholder="Ổ cứng" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Camera</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="camera"
                                        placeholder="Camera" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="manhinh"
                                        placeholder="Màn hình" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" min="1000" class="form-control" id="exampleInputEmail1"
                                        name="gia" placeholder="Giá" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <select class="form-control" name="danhmuc" id="">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->madanhmuc }}">{{ $item->tendanhmuc }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="img" accept="image/png, image/gif, image/jpeg" >
                                        <label class="custom-file-label" for="customFile">Chọn hình</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Mô tả
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea id="summernote" name="mota">
                                            
                                          </textarea>
                                        </div>
                                    </div>
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
    <script src="{{ url('adminAsset/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endsection
