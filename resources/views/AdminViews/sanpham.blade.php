@extends('AdminViews/Template/AdminTemplate')
@section('title')
    Quản lý sản phẩm
@endsection
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('sanpham')
    active
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>CPU</th>
                                        <th>RAM</th>
                                        <th>Card</th>
                                        <th>Ổ cứng</th>
                                        <th>Camera</th>
                                        <th>Màn hình</th>
                                        <th>Giá</th>
                                        <th>Danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->masp }}</td>
                                            <td><img src="{{url("storage/product-img/$item->anh")}}" alt="" class="img-thumbnail"></td>
                                            <td>{{ $item->tensp }}</td>
                                            <td>{{ $item->cpu }}</td>
                                            <td>{{ $item->ram }}</td>
                                            <td>{{ $item->card }}</td>
                                            <td>{{ $item->ocung }}</td>
                                            <td>{{ $item->camera }}</td>
                                            <td>{{ $item->manhinh }}</td>
                                            <td>{{ $item->gia }}</td>
                                            <td>{{ $item->danhmuc()->first()->tendanhmuc}}</td>
                                            <td>
                                                <div class="row justify-conent-center">
                                                    <div class="col-12"><a
                                                            href="{{ url("admin/sanpham/chinhsua/$item->masp") }}"
                                                            class="btn btn-warning"><i class="fa fa-table"
                                                                aria-hidden="true"></i></a></div>
                                                </div>
                                                <div class="row justify-conent-center">
                                                    <div class="col-6"><button class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal" data-ten="{{$item->tensp}}" data-whatever="{{$item->masp}}"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>CPU</th>
                                        <th>RAM</th>
                                        <th>Card</th>
                                        <th>Ổ cứng</th>
                                        <th>Camera</th>
                                        <th>Màn hình</th>
                                        <th>Giá</th>
                                        <th>Danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!--MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>Bạn có chắc muốn xóa không?</div>
            </div>
            <div class="modal-footer">
                <a href="{{url("admin/sanpham/xoa/")}}" class="btn btn-danger" id="idDelete">Xóa</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('js')
    <script src="{{ url('adminAsset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('adminAsset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var recipient1 = button.data('ten') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body').text('Bạn có chắc muốn xóa sản phẩm '+ recipient1+' không?')
            $("#idDelete").attr("href", "/admin/sanpham/xoa/"+recipient)
        })
    </script>
@endsection
