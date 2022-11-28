@extends('AdminViews/Template/AdminTemplate')
@section('title')
    Quản lý khách hàng
@endsection
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminAsset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('khachhang')
    active
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Khách hàng</li>
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
                                        <th>Mã khách hàng</th>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->makh }}</td>
                                            <td>{{ $item->tenkh }}</td>
                                            <td>{{ $item->sdt }}</td>
                                            <td>{{ $item->diachi }}</td>
                                            <td>
                                                <div class="row justify-conent-center">
                                                    <div class="col-3"><a
                                                            href="{{ url("admin/khachhang/chinhsua/$item->makh") }}"
                                                            class="btn btn-warning"><i class="fa fa-table"
                                                                aria-hidden="true"></i></a></div>
                                                    <div class="col-3"><button class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal" data-whatever="{{$item->makh}}"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button></div>
                                                    <div class="col-3">
                                                        <button class="btn btn-primary"><i class="fa fa-key"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã khách hàng</th>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
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
                <a href="{{url("admin/nguoidung/xoa/")}}" class="btn btn-danger" id="idDelete">Xóa</a>
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
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body').text('Bạn có chắc muốn xóa khách hàng '+ recipient+' không?')
            $("#idDelete").attr("href", "/admin/khachhang/xoa/"+recipient)
        })
    </script>
@endsection
