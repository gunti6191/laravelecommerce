@extends("layouts.admin")

@section("styles")
    <style>
        .card-title{
            font-size: 25px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        label{
            font-size: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif, Cochin, Georgia, Times, 'Times New Roman', serif, Geneva, Tahoma, sans-serif;
        }
        input{
            font-family: 'Trebuchet MS', sans-serif; font-size:20px; font-weight:bold;
        }
    </style>
@endsection

@section("pagecss")
    {{-- Datepicker CSS --}}<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    {{-- Datepicker UI CSS --}}<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-darkness/jquery-ui.css"/>
    {{-- Datepicker UI CSS --}}<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-darkness/jquery-ui.css"/>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection

@section("content")
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- <div class="col-sm-6">
            <h1>EDIT</h1>
          </div> --}}
          <div class="col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row mb-5">

        <div class="col-md-6 offset-md-3 mb-5">
          <div class="card shadow-lg">
            <div class="card-header">
              <h6 class="card-title">ADD USER</h6>

              <div class="card-tools">
                <a href="{{ route('users.index') }}" class="btn btn-lg btn-primary">LIST</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name<span class="text-danger"> *</span></label>
                        <input type="text" id="name" class="form-control" placeholder="Jack" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger"> *</span></label>
                        <input type="email" id="email" class="form-control" placeholder="jack@jarvis.com" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span class="text-danger"> *</span></label>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="conpassword">Confirm Password<span class="text-danger"> *</span></label>
                        <input type="password" id="conpassword" class="form-control" placeholder="Confirm Password" name="conpassword" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                              <label>Address<span class="text-danger"> *</span></label>
                              <textarea class="form-control" placeholder="Please enter your address" name="address" required rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputFile">File input<span class="text-danger"> *</span></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label fs-6" for="exampleInputFile">Choose file</label>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 row">
                        {{-- <a href="{{ route('users2.index') }}" class="btn btn-lg btn-secondary">Back</a> --}}
                        <div class="col-4 offset-md-4">
                            <input type="submit" value="CREATE" onclick="add();" class="btn btn-lg btn-success ml-3">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section("pagejs")
    {{-- Jquery datepicker JS --}}<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- SweetAlert2 -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection

@section("scripts")
    <script>
        function add(){
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            Toast.fire({
            icon: 'success',
            title: 'Record Added Successfully!'
            })
        }
    </script>
@endsection


