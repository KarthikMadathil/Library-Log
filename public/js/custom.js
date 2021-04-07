// alert("Custom Js");
function login() {

  var reg = $("#register_no").val();
  console.log(reg);

  // alert(reg);
  var _token = $('input[name=_token]').val();
  $.ajax({
    url:"{{route('log_update')}}",
    type:'POST',
    dataType:"json",
    data: {'reg_no':reg, _token}
  })
  .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
