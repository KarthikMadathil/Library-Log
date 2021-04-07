@extends('layouts.dashboard.skelton')
@section('content')
<div id = "flashMessage"></div>
<div class="container">
  <div class="row">


    <div class="col-lg-8">
      <div class="row">
        <div class="col">
          <div  class=" table-responsive card card-small mb-4">
            <div class="card-header border-bottom">
              <h6 class="m-0">Logged Users</h6>
              <form class=""action="{{route('checkout-all')}}" method="post">
                @csrf
                <button type="submit" class="m-0 border-0" onclick="return confirm('Are you sure you want to logout everyone?');"> Clear all log</button>
              </form>
            </div>
            <div class="table-responsive card-body p-0 pb-3 text-center">
              <table class=" sm-2 table mb-0" id="log_table">
                <thead class="bg-light">
                  <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">Name</th>
                    <th scope="col" class="border-0">Register Number</th>
                    <th scope="col" class="border-0">Logged In</th>
                    <th scope="col" class="border-0">Checkout</th>
                  </tr>
                </thead>
                <tbody >
                  @foreach ($logs as $log)
                  <tr>
                    <td>{{$log->id}}</td>
                    <td>{{$log->students->name}}</td>
                    <td>{{$log->students->reg_no}}</td>
                    <td>{{Carbon\Carbon::parse($log->created_at)->format(' h:i:s A')}}</td>
                    <td>
                      <form class="" method="post">

                      <button type="submit" class="mb-2 btn btn-outline-danger mr-2 mcheckout" value="{{$log->students->reg_no   }}" onfocus="exit()">Check out</button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="row">

        <div class="card card-small mb-4 p-4">
          <div class="card-header border-bottom text-center">
            <div class="mb-3 mx-auto">
              <img class="" id="log_user_avatar" src="" alt="Avatar" width="110"> </div>
              <h4 class="mb-0" id="log_user"></h4>
              <span class="text-muted d-block mb-2" id="check_status"></span>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-4">
                <div class="progress-wrapper">
                  <strong class="text-muted d-block mb-2" id="log_time"></strong>
                </div>
              </li>
            </ul>
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
  $('#log_').addClass('active');
});


   // Stuff to do as soon as the DOM is ready
function exit() {
  $('.mcheckout').on('click', function(event) {
    var reg= $(this).val();
    // alert(reg);
    Make_log(reg);
  });
}

function login() {
  var reg = $("#register_no").val();
  console.log(reg);
  Make_log(reg);
}

function Make_log(regNum) {

  var now = new Date(Date.now());
  var formatted =  now.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });



  event.preventDefault();
  var _token = $('input[name=_token]').val();
  $.ajax({
    url:"{{route('log_update')}}",
    type:'POST',
    dataType:"json",
    data: {'reg_no':regNum, _token}
  })
  .done(function(data) {
    $("#log_table").load(location.href +" #log_table");
    $('#log_user_avatar').attr("src",data.img_path);
    $('#check_status').text(data.data);
    $('#log_user').text(data.user.students.name);
    $('#log_user').text(data.user.students.reg_num);
    $('#log_time').text( formatted);

    console.log(data);

    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
    $('#register_no').val('');

  });

}


</script>

@endsection
