@extends('layouts.dashboard.skelton')
@section('title', 'Log Report')
@section('sub-title', 'Complete report of a student')
@section('content')
<div id = "flashMessage"></div>
<div class="container">
  <div class="row">
    <div class="col-lg-3 ">
    </div>
    <div class="col-lg-4 ">
                  <div class="card card-small mb-4 pt-3">
                    <div class="card-header border-bottom text-center">
                      <div class="mb-3 mx-auto">
                        <img class="rounded-circle" alt="User Avatar"  width="110" src= {{asset('storage/avatars/'.$student->avatar)}}  > </div>
                      <h4 class="mb-0">{{$student->name}}</h4>
                      <!-- <span class="text-muted d-block mb-2">Project Manager</span> -->
                      <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2" disabled>
                        <i class="material-icons mr-1">person_add</i>{{$student->reg_no}}</button>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-4">
                        <div class="progress-wrapper">
                          <strong class="text-muted d-block mb-2">Register Number :
                          <span>

                          {{$student->reg_no}}
                        </span>
                      </strong>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
    </div>
    <div class="row">

    <div class="col">
        <div class=" table-responsive card card-small mb-4">
          <div class="card-header border-bottom">
            <h6 class="m-0">Latest Log</h6>
          </div>
          <div class="card-body p-0 pb-3 text-center">
            <table class="table mb-0">
              <thead class="bg-light">
                <tr>
                  <th scope="col" class="border-0">#</th>
                  <th scope="col" class="border-0">Chekin</th>
                  <th scope="col" class="border-0">Checkout</th>
                  <th scope="col" class="border-0">Duration (in Minutes)</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
                <tr>
                  <td>{{$dt->id}}</td>
                  <td>{{Carbon\Carbon::parse($dt->created_at)->format('jS \\of F Y h:i:s A')}}</td>
                  <td>{{Carbon\Carbon::parse($dt->updated_at)->format('jS \\of F Y h:i:s A')}}</td>
                  <td>{{Carbon\Carbon::parse($dt->updated_at)->diffInMinutes($dt->created_at) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="card-footer">
              <div class="card-footer bg-transparent border-success mx-auto">
                {{ $data->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
  $('#Report_').addClass('active');
});
</script>
@endsection
