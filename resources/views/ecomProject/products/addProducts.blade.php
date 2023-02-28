@extends("layouts.admin")

@section("pagecss")

   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- Bootstrap4 Duallistbox -->
   <link rel="stylesheet" href="/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
   <!-- BS Stepper -->
   <link rel="stylesheet" href="/assets/plugins/bs-stepper/css/bs-stepper.min.css">
   <!-- dropzonejs -->
   <link rel="stylesheet" href="/assets/plugins/dropzone/min/dropzone.min.css">
          <!-- SweetAlert2 -->
          <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection

@section("styles")
<style>
    .card-title{
        font-size: 25px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    label{
        font-size: 15px;margin-top:10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif, Cochin, Georgia, Times, 'Times New Roman', serif, Geneva, Tahoma, sans-serif;
    }
    input{
        font-family: 'Trebuchet MS', sans-serif; font-size:20px; font-weight:bold;
    }
</style>
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
              <li class="breadcrumb-item">Ecommerce</li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">ADD PRODUCT</h3>
                    <a class="btn btn-primary float-right btn-lg" href="{{ route('products.index') }}">LIST</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger"> *</label>
                                    <input type="text" class="form-control" required name="name" id="name" placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger"> *</label>
                                    <select class="form-control" required id="status" name="status">
                                        <option></option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="rating">Rating<span class="text-danger"> *</span></label>
                                    <input type="number" min='0' max='5' step='0.5' class="form-control" required name="rating" id="rating" placeholder="Enter Value">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="price">Price<span class="text-danger"> *</span></label>
                                            <input type="number" class="form-control" required name="price" id="price" placeholder="Enter Actual Price">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cost_price">Cost Price<span class="text-danger"> *</span></label>
                                            <input type="number" class="form-control" required name="cost_price" id="cost_price" placeholder="Enter Cost Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="is_discount_available">Is Discount Available?<span class="text-danger"> *</span></label>
                                    <select class="form-control" required id="is_discount_available" name="is_discount_available">
                                        <option></option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="discount_price">Discount Price<span class="text-danger"> *</span></label>
                                        <input type="number" class="form-control" required name="discount_price" id="discount_price" placeholder="Enter Cost Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="short_description">Description<span class="text-danger"> *</span></label>
                                    <textarea class="form-control" required placeholder="Description" id="short_description" name="short_description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                      <button type="submit" onclick="add();" class="btn btn-primary btn-lg">CREATE</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section("pagejs")

<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- bootstrap color picker -->
<script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="/assets/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection


@section("scripts")
@endsection
