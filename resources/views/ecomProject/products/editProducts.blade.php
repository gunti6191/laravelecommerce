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
                <li class="breadcrumb-item active">Edit</li>
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
                    <h3 class="card-title">EDIT PRODUCT</h3>
                    <a class="btn btn-primary float-right btn-lg" href="{{ route('products.index') }}">LIST</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="javascript:void(0);" id="form" onsubmit="formValidate();">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-row">
                                    <label for="name">Name<span class="text-danger"> *</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" placeholder="Enter Product Name">
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-row">
                                    <label for="status">Status<span class="text-danger"> *</label>
                                    <select class="form-control" id="status" name="status">
                                        <option>{{ $product->status }}</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-row">
                                    <label for="category_id">Category<span class="text-danger"> *</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-row">
                                    <label for="brand_id">Brand<span class="text-danger"> *</label>
                                    <select class="form-control" id="brand_id" name="brand_id">
                                        <option value="{{ $product->brand_id }}">{{ $product->brand->name }}</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-row">
                                    <label for="rating">Rating<span class="text-danger"> *</span></label>
                                    <input type="number" min='0' max='5' step='0.5' class="form-control" name="rating" id="rating" value="{{ $product->rating }}" placeholder="Enter Value">
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-row">
                                            <label for="price">Price<span class="text-danger"> *</span></label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" placeholder="Enter Actual Price">
                                            <div class="invalid-feedback">
                                                <h5>This field is required!</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-row">
                                            <label for="cost_price">Cost Price<span class="text-danger"> *</span></label>
                                            <input type="number" class="form-control" name="cost_price" id="cost_price" value="{{ $product->cost_price }}" placeholder="Enter Cost Price">
                                            <div class="invalid-feedback">
                                                <h5>This field is required!</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-row">
                                    <label for="is_discount_available">Is Discount Available?<span class="text-danger"> *</span></label>
                                    <select class="form-control" id="is_discount_available" name="is_discount_available">
                                        <option>{{ $product->is_discount_available }}</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    <div class="form-group form-row">
                                        <label for="discount_price">Discount Price<span class="text-danger"> *</span></label>
                                        <input type="number" class="form-control" name="discount_price" value="{{ $product->discount_price }}" id="discount_price" placeholder="Enter Cost Price">
                                        <div class="invalid-feedback">
                                            <h5>This field is required!</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group form-row">
                                    <label for="short_description">Description<span class="text-danger"> *</span></label>
                                    <textarea class="form-control" placeholder="Description" id="short_description" name="short_description" rows="3">{{ $product->short_description }}</textarea>
                                    <div class="invalid-feedback">
                                        <h5>This field is required!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
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
<script>
    function formValidate() {
            name = $("#name").val();
            status = $("#status").val();
            category_id = $("#category_id").val();
            brand_id = $("#brand_id").val();
            rating = $("#rating").val();
            price = $("#price").val();
            cp = $("#cost_price").val();
            isDis = $("#is_discount_available").val();
            dp = $("#discount_price").val();
            desc = $("#short_description").val();

            if(name == ""){
                $("#name").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#name").removeClass("is-invalid").addClass("is-valid");
            }

            if(status == ""){
                $("#status").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#status").removeClass("is-invalid").addClass("is-valid");;
            }

            if(category_id == ""){
                $("#category_id").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#category_id").removeClass("is-invalid").addClass("is-valid");;
            }

            if(brand_id == ""){
                $("#brand_id").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#brand_id").removeClass("is-invalid").addClass("is-valid");;
            }

            if(rating == ""){
                $("#rating").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#rating").removeClass("is-invalid").addClass("is-valid");
            }

            if(price == ""){
                $("#price").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#price").removeClass("is-invalid").addClass("is-valid");
            }

            if(cp == ""){
                $("#cost_price").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#cost_price").removeClass("is-invalid").addClass("is-valid");
            }

            if(isDis == ""){
                $("#is_discount_available").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#is_discount_available").removeClass("is-invalid").addClass("is-valid");
            }

            if(dp == ""){
                $("#discount_price").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#discount_price").removeClass("is-invalid").addClass("is-valid");
            }

            if(desc == ""){
                $("#short_description").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#short_description").removeClass("is-invalid").addClass("is-valid");
            }

            if (name != "" && status != "" && category_id != "" && brand_id != "" && rating != "" && price != "" && cp != "" && isDis != "" && dp != "" && desc != "") {

                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    Toast.fire({
                    icon: 'success',
                    title: 'Record Modified Successfully!'
                })

                var form = document.getElementById("form");

                // set the action attribute to the desired URL
                form.action = "{{ route('products.update', $product->slug) }}";
                form.method = "post";

                // add an event listener to the form's submit event
                form.addEventListener("submit", function(event) {
                    // prevent the default form submission behavior
                    event.preventDefault();

                    // submit the form using the specified URL
                    form.submit();
                });
            }
        };
    </script>
</script>
@endsection
