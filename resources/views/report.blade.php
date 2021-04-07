@extends('layouts.dashboard.skelton')
@section('title', 'Log Reports')
@section('sub-title', 'Detaild reporting')
@section('content')
<div id = "flashMessage"></div>
<div class="container">
  <div class="row">
    <form class="" action="{{route('report.post')}}" method="get">
      {{-- @csrf --}}
      <div class="form-row">
      <div class="form-group">
          <div class="input-group mb-2">
            <label class="custom-control  ml-1" >Roll Num &nbsp; </label>

            <div class="input-group-prepend">
              <span class="input-group-text" id="regi_num">@</span>
            </div>
            @if (request()->has('reg_num'))
            <input type="text" class="form-control" placeholder="Register Number" name="reg_num" value="{{request()->reg_num}}"> </div>
            @else        
            <input type="text" class="form-control" placeholder="Register Number" name="reg_num" > </div>
            @endif
        </div>
      <div class="form-group">
          <div class="input-group mb-2">
            <label class="custom-control  ml-1" >Date &nbsp; </label>
            <div class="input-group-prepend">
              <span class="input-group-text" id="filter-df">#</span>
            </div>
            <input type="date" class="form-control" placeholder="From"  name="date_from" @if (request()->has('date_from'))
                value="{{request()->date_from}}" 
            @endif >
          </div>
        </div>

       <div class="form-group">
          <div class="input-group mb-1">
            <label class="custom-control  ml-1" >Date To &nbsp; </label>
            <div class="input-group-prepend">
              <span class="input-group-text" id="filter-dt">#</span>
            </div>
            <input type="date" class="form-control"  placeholder="From"  name="date_to"  @if (request()->has('date_to'))
                value="{{request()->date_to}}" 
            @endif > 
          </div>
        </div>
{{-- 
       <div class="form-group">
          <div class="input-group mb-1">
            <label class="custom-control  ml-1" >Time From &nbsp; </label>
            <div class="input-group-prepend">
              <span class="input-group-text" id="filter-tf">#</span>
            </div>
            <input type="time" class="form-control" placeholder="From"  name="time_from" >
          </div>
        </div>
       <div class="form-group">
          <div class="input-group mb-1">
            <label class="custom-control  ml-1" >Time to &nbsp; </label>
            <div class="input-group-prepend">
              <span class="input-group-text" id="filter-tt">#</span>
            </div>
            <input type="time" class="form-control" placeholder="From"  name="time_to" >
          </div>
        </div>
 --}}

      <div class="form-group">
          <div class="input-group ml-3">
            <button type="submit" value="find" class="mb-2 btn btn-outline-primary mr-5 sm-12 ">Find</button>
            <button type="submit" value="print" class="mb-2 btn btn-outline-primary mr-5 sm-12 ">Print</button>
           </div>
        </div>
    </div>
  </form>
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
                  <th scope="col" class="border-0">Name</th>
                  <th scope="col" class="border-0">Register Number</th>
                  <th scope="col" class="border-0">Chekin</th>
                  <th scope="col" class="border-0">Checkout</th>
                  <th scope="col" class="border-0">Duration (in Minutes)</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
                <tr>
                  <td>{{$dt->id}}</td>
                  <td>
                  <a href="{{route('student.show',['id'=>$dt->students->id ])}}">
                    {{$dt->students->name}}
                  </a>
                </td>
                  <td>{{$dt->students->reg_no}}</td>
                  <td>{{Carbon\Carbon::parse($dt->created_at)->format('jS \\of F Y h:i:s A')}}</td>
                  <td>{{Carbon\Carbon::parse($dt->updated_at)->format(' h:i:s A')}}</td>
                  <td>{{Carbon\Carbon::parse($dt->updated_at)->diffInMinutes($dt->created_at) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="card-footer">
              <div class="card-footer bg-transparent border-success mx-auto">

                {{ $data->appends(request()->input())->links() }}
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
