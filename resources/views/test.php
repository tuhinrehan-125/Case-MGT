
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--==================SERACH=============-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="_token" content="{{ csrf_token() }}">
    <!--===================search=============-->
    <title>Case Management</title>
    <style>
    html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}


/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */

body > .container {
  padding: 60px 15px 0;
}

.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}

code {
  font-size: 80%;
}
    </style>
</head>
<body>
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <!-- <a class="navbar-brand" href="#">Fixed navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
           
          </ul>
          <ul class="nav justify-content-end">
            <li class="nav-item m-2">
                <a href="{{url('/unitauth/login')}}" class="btn btn-success"> Login Unit</a>
            </li>
            <li class="nav-item m-2">
                <a href="{{url('/superadmin/login')}}" class="btn btn-danger"> Login Super Admin</a>
            </li>
        </ul>
          <!-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
    </header>
    <main role="main" class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="text-center  mx-auto">
                    <!--<a href="{{url('/dashboard')}}">-->
                        <img src="{{asset('/frontend/image/can_logo.png')}}" class="v-hidden" alt="logo" {{--height="80px" width="80px"--}}>
                    </div>
                    <div class="text-center mx-auto">
                        <h3><center class="text-uppercase">Cantonment Board,Dhaka <!-- মিলিটারি পুলিশ,ঢাকা --></center></h3>
                        <!-- যানবাহন মামলা নিষ্পত্তি -->
                        <!--</a>-->

                        <div class="mt-5">test</div>
                    </div>
                </div>
                <div class="card-body">
                </div>
                <div class="card-footer">
                
                </div>
            </div>
     </main>

<footer class="footer"> 
        
        <div class="row">
                <div class="col-md-4 card">
                    <h3 class="text-center">About Us</h3>
                    <p>Dhaka Cantonment was declared in 1952 vide Gazette Notification No 425(A)52. It was measured 430.31 acre in 1952. At present the area of Dhaka Cantonment Board is 3804.9145 Acre, which is sorrunded by Dhaka North City Corporation.</p>
                </div>
                <div class="col-md-4 card">
                    <h3 class="text-center">Contact Information</h3>
                    <p class="text-center">
                    <address class="text-center">Cantonment Board Office</address>
                    <address class="text-center">Dhaka Cantonment, Dhaka-1206<br>
                    <span class="text-center">Phone : 02-9835595 (T&T), 7210 (Army)</span><br>
                    <span class="text-center">email: ceocbd@gmail.com</address></p>
                </div>
                <div class="col-md-4 card">
                    <h3 class="text-center">Developed By</h3>
                    <p class="text-center"><a href="www.ennvisio.com">Ennvisio Digital Private Limited</a></p>
                </div>
            </div>
        </footer>
</body>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#search').on('keyup',function(){
        var value =$(this).val();
        //alert(value);
        $.ajax({
            type : 'get',
            url: '{{url("/search")}}',
            data:{
                value:value
            },
            success:function(data){
                //alert(data);
                $('tbody').html(data);
            }
        });
    })
</script>
</html>
