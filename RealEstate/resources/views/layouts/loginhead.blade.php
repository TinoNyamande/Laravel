<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Real Estate</title>
    <script src="{{asset('bootstrap\js\bootstrap.min.js')}}"  defer> </script>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
<script src="{{asset('bootstrap\js\bootstrap.bundle.min.js')}}"  defer> </script>
<script src="{{asset('bootstrap\jquery.js')}}"  defer> </script>
<link href="{{asset('bootstrap\css\bootstrap.min.css')}}" rel="stylesheet"> 
<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
-->
</head>
<body class="body">
    <div style="margin:15px;padding:15px">
    <div  style="margin-bottom:40px;width:100%">
        <div>
            <a  class= "btn btn-primary head-links " href="{{route('home')}}">Home</a>
            <a class= "btn btn-primary head-links" href="{{route('dashboard.create')}}">Add</a>
            <a class= "btn btn-primary head-links " href="{{route('dashboard')}}">My Posts</a>         
            <form style="float:right;margin:5px" method="POST" action="{{ route('logout') }}">
                @csrf
            <a  class= "btn btn-danger" href="{{route('logout')}}"
              onclick="event.preventDefault(); this.closest('form').submit();">
            LogOut</a>
            </form>
            <a style="float:right;margin:5px"" class= "btn btn-primary ">{{ Auth::user()->name }} </a>
         </div>     
            @if (Route::has('login'))
                    @auth
                        <a style="float:right" href="{{ url('/dashboard') }}" 
                        style="text-decoration:none;font-size:200%" >My Profile</a>
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


    @yield('content')

</body>
</html>