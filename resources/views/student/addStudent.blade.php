@extends('layouts.dashboard.skelton')
@section('title', 'Add Student')
@section('sub-title', 'To Add Student')
@section('content')
<div id = "flashMessage"></div>
@if (Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
<div class="col-lg-11">
  <div class="card card-small mb-4">
    <div class="card-header border-bottom">
      <h6 class="m-0">Student Details</h6>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item p-3">
        <div class="row">
          <div class="col">
            <form method="post" action="{{route('student.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-row" >
                <div class="form-group col-md-10">
                  <label for="name">Name</label>
                  <input type="text" class="form-control"  id="name" name="name" placeholder="Full Name" > </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="reg_no">Register Number</label>
                    <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Register " >
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar"  name="avatar" placeholder="Upload Display Image">
                  </div>
                </div>
                <button type="submit" class="btn btn-accent">ADD </button>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="card card-small mb-4">
    <div class="card-header border-bottom">
      <h6 class="m-0">Student Bulk  Import</h6>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item p-3">
        <div class="row">
          <div class="col-sm-12 col-md-6">

            <div class="col-sm-12 col-md-6">

              <form action="{{route('student.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <strong class="text-muted d-block mb-2">Choose File</strong>
                  <input type="file" name="import_file" class=" mb-3" value="">
                  <button type="submit" class="btn btn-accent" name="button">Import</button>
                </div>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>

  @endsection
  @section('scripts')
  <script type="text/javascript">

  $(document).ready(function() {
    $('#AddStud_').addClass('active');
  });
</script>

@endsection
