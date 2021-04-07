@extends('layouts.dashboard.skelton')
@section('title', 'Dashboard')
@section('sub-title', 'Overview')
@section('content')
<div class="row">
  <div class="col-lg col-md-6 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">Visitors Last Hour</span>
            <h6 class="stats-small__value count my-3"> {{$HoursVisits}} </h6>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg col-md-6 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">Todays Visitors</span>
            <h6 class="stats-small__value count my-3"> {{$todaysVisits}} </h6>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg col-md-6 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">Visitors Lastday</span>
          <h6 class="stats-small__value count my-3"> {{$yesterdaysVisits}} </h6>
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
  $('#dashb_').addClass('active');
});
</script>
@endsection
