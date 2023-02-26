@extends("layouts.admin")

@section("styles")
    <style>
        tbody th{
            font-family: 'Trebuchet MS', sans-serif; font-size:17px;
        }
        thead,tfoot{
            text-align: center;background: paleturquoise
        }
        tbody{
            background: bisque;
        }
        thead th,tfoot th{
            font-size: 20px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, Courier, monospace, Times, serif;
        }
        .card-title{
            font-size: 30px;
            font-weight: 700;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .card-body{
            background: lightgoldenrodyellow;
        }
        #records{
            font-size: 20px;font-weight: 900;background-color: gainsboro;
        }
    </style>
@endsection

@section("pagecss")
      <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
@endsection
@section("content")
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- <div class="col-sm-6">
            <h1>List</h1>
          </div> --}}
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Users</li>
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
              <div class="card-header">
                <h3 class="card-title pl-5" style="line-height: 60px;">USERS</h3>
                <a href="{{ route('users.create') }}" class="btn bg-gradient-primary btn-lg float-right mx-3"><b>ADD</b> &nbsp;&nbsp;<i class="fas fa-user-plus"></i></a>
                <a class="btn bg-gradient-primary btn-lg float-right">IMPORT EXCEL</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sno=1;$limit=2?>
                    @foreach($users as $user)
                    <tr class="rowCount">
                        <th>{{ $sno++ }}</th>
                        <th><img src="/assets/dist/img/avatar<?php echo ($limit==6)?$limit=2:$limit++;?>.png" height="40px" width="40px"/></th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th class="text-monospace">{{ $user->password }}</th>
                        <th class="text-center">
                            <a class="btn btn-info btn-sm mx-2" href="{{ route("users.edit", $user->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm mx-2" href="javascript:void(0)" onclick="deleteUser({{ $user->id }});">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </th>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section("pagejs")
<!-- DataTables  & Plugins -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Toastr -->
<script src="/assets/plugins/toastr/toastr.min.js"></script>
@endsection
@section("scripts")

<script>
    function deleteUser(id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            Toast.fire({
            icon: 'success',
            title: 'Record Deleted Successfully!'
            })
            window.location.href="{{ route('users.delete','') }}"+"/"+id;
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your Record is Safe :)',
            'error'
            )
        }
        })
    }

    //  Page specific script

    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
       });
       localStorage.setItem("rows", "{{ $sno-1 }}");
  </script>
@endsection

