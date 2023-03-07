@extends("layouts.admin")

@section("styles")
    <style>
        tbody{
            font-family: 'Trebuchet MS', sans-serif; font-size:17px;
        }
        thead,tfoot{
            text-align: center;background: paleturquoise
        }
        tbody{
            background: bisque;text-align: center;
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
    </style>
@endsection

@section("pagecss")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
                <li class="breadcrumb-item">Ecommerce</li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">List</li>
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
                <h3 class="card-title pl-5" style="line-height: 60px;">PRODUCTS</h3>
                <a href="{{ route('products.create') }}" class="btn bg-gradient-primary btn-lg float-right mx-3"><b>ADD</b></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered border-dark data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Rating</th>
                            <th>Price</th>
                            <th>CP</th>
                            <th>Discount?</th>
                            <th>DP</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Rating</th>
                            <th>Price</th>
                            <th>CP</th>
                            <th>Discount?</th>
                            <th>DP</th>
                            <th>Status</th>
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
  <!-- SweetAlert2 -->
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Toastr -->
<script src="/assets/plugins/toastr/toastr.min.js"></script>
@endsection
@section("scripts")
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'brand', name: 'brand'},
                    {data: 'rating', name: 'rating'},
                    {data: 'price', name: 'price'},
                    {data: 'cost_price', name: 'cost_price'},
                    {data: 'is_discount_available', name: 'is_discount_available'},
                    {data: 'discount_price', name: 'discount_price'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        function deleteBtn(id){
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
                window.location.href="{{ route('products.delete','') }}"+"/"+id;
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
    </script>
@endsection

