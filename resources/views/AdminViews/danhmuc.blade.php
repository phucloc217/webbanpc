@extends('AdminViews/Template/AdminTemplate')
@section('title')
    Quản lý danh mục
@endsection
@section('style')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{url("adminAsset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{url("adminAsset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{url("adminAsset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
@endsection
@section('danhmuc')
    active
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("admin")}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh mục</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>{{$item->madanhmuc}}</td>
                      <td>{{$item->tendanhmuc}}</td>
                      <td>{{$item->sanphams()->count()}}</td>
                      <td> </td>
                    </tr>
                    @endforeach
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng sản phẩm</th>
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
@endsection
@section('js')
<script src="{{url("adminAsset/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{url("adminAsset/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script>
  $(function () {
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
</script>
@endsection