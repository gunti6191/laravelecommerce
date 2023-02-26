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
              <li class="breadcrumb-item">Ecommerce</li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">Edit</li>
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
              <h6 class="card-title">EDIT CATEGORY</h6>

              <div class="card-tools">
                <a href="{{ route('categories.index') }}" class="btn btn-lg btn-primary">LIST</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <form action="javascript:void(0);" id="form" onsubmit="formValidate();">
                    @csrf
                    <div class="form-group form-row">
                        <label for="name">Name<span class="text-danger"> *</span></label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $category->name }}">
                        <div class="invalid-feedback">
                            <h5>Enter Category Name!</h5>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="slug">Slug<span class="text-danger"> *</span></label>
                        <input type="text" id="slug" class="form-control" name="slug" value="{{ $category->slug }}">
                        <div class="invalid-feedback">
                            <h5>Enter Slug!</h5>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label for="status">Status<span class="text-danger"> *</span></label>
                        <select class="custom-select form-control" id="status" name="status">
                            <option>{{ $category->status }}</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                        <div class="invalid-feedback">
                            <h5>Select the option!</h5>
                        </div>
                    </div>
                    <div class="mt-5 row">
                        <div class="col-4 offset-md-4">
                            <input type="submit" value="UPDATE" class="btn btn-lg btn-success ml-3">
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
        function formValidate() {
            name = $("#name").val();
            slug = $("#slug").val();
            status = $("#status").val();
            if(name == ""){
                $("#name").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#name").removeClass("is-invalid").addClass("is-valid");
            }

            if(slug == ""){
                $("#slug").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#slug").removeClass("is-invalid").addClass("is-valid");
            }

            if(status == ""){
                $("#status").removeClass("is-valid").addClass("is-invalid");
            }else{
                $("#status").removeClass("is-invalid").addClass("is-valid");;
            }
            if (name != "" && slug != "" && status != "") {

                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    Toast.fire({
                    icon: 'success',
                    title: 'Record Updated Successfully!'
                })

                var form = document.getElementById("form");

                // set the action attribute to the desired URL
                form.action = "{{ route('categories.update', $category->id) }}";
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
@endsection


