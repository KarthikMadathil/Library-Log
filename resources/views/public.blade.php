<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>Marian</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <!-- owl-carousal -->
  <link rel="stylesheet" href="owl/dist/assets/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="owl/dist/assets/owl.theme.default.min.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="owl/dist/owl.carousel.js" type="text/javascript"></script>


</head>
<style media="screen">
body{
  height: 100vh;
  width: 100vw;
  background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7));
  background-size: cover;
  font-family: 'Raleway', sans-serif;
  font-family: 'Open Sans', sans-serif;
}
.item img{
  background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7));

}
h3::after{
  content: ' Today a leader,Tommarrow a leader';
  display:block;
  font-size: .8rem;
  padding-top: 5px;
}
header,.logged-user{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
input{
  background: transparent;
  border: none;
  border-bottom:1px solid #252525;
  padding: .3rem;
}
footer{
    position: fixed;
    left: 0;
    bottom: 5%;
    width: 100%;
    color: white;
    text-align: center;

}
td{
  vertical-align: middle;
}
table{
  border: 1px solid grey;
  border-radius: 5px;
}
.btn-wrap{
  margin: 0;
  background-color: transparent;
  text-align: center;    }
  h5{
    font-size: .8rem;
  }
  input:focus{
    border:none;
  }
  .fld{
    margin-left: 30px;
    border: 1px solid #252525;
  }
  .logo{
    height: 130px;
    width: auto;
  }
  .card,.table-wrap{
    background: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5));
  }
  .icon{
    width: 20px;height: auto;
  }
  .owl-dots{
    display: none;
  }
  .bg{
    position: absolute;
    top: 0;
    left: 0;
    width:100vw;height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7));
  }

  </style>
  <body>
    <div class="owl-carousel owl-theme"style="width:100vw;height:100vh; position:absolute;z-index:-100;" >
      <div class="item"style="width:100%;height:100% ;  ">
        <img src="img/bg.jpg" alt="" style="width:100vw;height:100vh;">
        <div class="bg"></div>
      </div>
      <div class="item"style="width:100%;height:100%">
        <img src="img/bg1.jpeg" alt="" style="width:100vw;height:100vh;">
        <div class="bg"></div>

      </div>
      <div class="item"style="width:100%;height:100%">
        <img src="img/bg2.jpg" alt="" style="width:100vw;height:100vh;">
        <div class="bg"></div>

      </div>
    </div>

    <div class="container">
      <header class="py-3 text-white">
        <div class="left pt-4">
          <h3>Marian College Library</h3>
        </div>
        <div class="right">
          <img class="logo" src="https://www.mariancollege.org/images/gallery/logo/logo-orange.png" alt="">
        </div>
      </header>
      <div class="row">
        <div class="col-md-8">
          <div class="table-wrap h-100 p-4 rounded" >
            <table class="table table-striped bg-transparent rounded text-light " id="log_table">
              <div class="container logged-user mb-3">
                <h4 class="text-light">Logged users <span id="ttcount">{{$count}}</span>
                </h4>

                <input  name="reg_no"  id="register_no" autofocus onchange ="login()" class="fld rounded" type="text" name="" value="">
                @csrf
              </div>
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Register number</th>
                  <th scope="col">Login</th>
                  <th scope="col">Checkout</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logs as $log)
                <tr>
                  <td>{{$log->students->name}}</td>
                  <td>{{$log->students->reg_no}}</td>
                  <td>{{Carbon\Carbon::parse($log->created_at)->format(' h:i:s A')}}</td>
                  <td>
                    <form class="" action="index.html" method="post">

                      <button type="button" class="mb-2 btn btn-outline-danger mr-2 mcheckout" value="{{$log->students->reg_no   }}" onfocus="exit()">Check out</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4" id="log-v">
          <div class="card text-white pb-1" style="width: 18rem;">
            <img id="log_user_avatar" src="/img/user.png" class="mx-auto img-rounded pt-5 pb-3" alt="..." style="width:150px;height:auto;">
            <div class="card-body">
              <form action="">
                <input type="text" id="log_user"style=" color: #ffff;"  placeholder="Name">
                <br>
                <input class="mt-2" type="text" id="log_reg" style=" color: #ffff;" placeholder="Register Number">
                <br>
                <input class="mt-2" type="text" id="log_time" style=" color: #ffff;" placeholder="Log Time">
                <div class="btn-wrap">
                  <div id="check_status" class="btn mt-4 btn-info px-5 btn-disabled" disabled> </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
<footer >
<div class="container text-center text-light">
    &copy; Copyright  <script>new Date().getFullYear()>2010&&document.write(+new Date().getFullYear());</script>,Verbalcodes. All Rights Reserved.
</div>
</footer>
    <script type="text/javascript">
    $('.owl-carousel').owlCarousel({
      items:1,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true

    })
  </script>

  <script type="text/javascript">

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
      $('#log_user').val(data.user.students.name);
      $('#log_reg').val(data.user.students.reg_no);
      $('#log-v').show();
      var presentCount = $('#ttcount').text();
      if (data.data=='LoggedIn') {
        presentCount++;
      } else {
        presentCount--;
      }
      // Total inside Count Updating
      $('#ttcount').text(presentCount);
      console.log(data);

      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
      $('#register_no').val('');
      $('#log-v').delay(5000).fadeOut('slow');

    });

  }


</script>
</body>
</html>
