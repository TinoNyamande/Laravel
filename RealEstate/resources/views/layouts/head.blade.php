<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Real Estate</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap\js\bootstrap.min.js')}}"  defer> </script>
<script src="{{asset('bootstrap\js\bootstrap.bundle.min.js')}}"  defer> </script>
<script src="{{asset('bootstrap\jquery.js')}}"  defer> </script>
<link href="{{asset('bootstrap\css\bootstrap.min.css')}}" rel="stylesheet"> 
<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
-->
</head>
<body class="body">
    <div  style="margin-bottom:40px;width:100%">
        <div>
            <a style="margin:10px;" class= "btn btn-primary " href="{{route('home')}}">
             Home</a>

            

            <a  style="margin:10px;" class= "btn btn-primary" href="{{route('rent')}}"> 
            Renting</a>

            <a  style="margin:10px;" class= "btn btn-primary " href="{{route('sale')}}" > 
            For Sale</a>
             
          

       
            @if (Route::has('login'))
                    @auth
                        <a class= "btn btn-primary " style="float:right;margin-top:5px;margin-right:5px" href="{{ url('/dashboard') }}" 
                    >Dashboard</a>
                    @else
                        <a style="float:right;margin:5px"  href="{{ route('login') }}"  
                        style=" ;text-decoration:none;font-size:200%" >
                            <button class="btn btn-danger btn-sm" >
                                Log in 
                            </button>
                        </a>

                        @if (Route::has('register'))
                            <a style="float:right;margin:5px"  href="{{ route('register') }}" 
                            style="text-decoration:none;font-size:200%;" >
                            <button class="btn btn-danger btn-sm" >
                                Register
                            </button>
                        </a>
                        @endif
                    @endauth
            
            @endif
</div>
<br><br><br>

    @yield('content')

</body>
</html>