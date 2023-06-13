@extends('layouts.head')
@section('content')
<div>
    <p>Price:{{$price}}</p>
    <p>Location:{{$location}}</p>
    <p>Type:{{$type}}</p>
    <p>Description:{{$description}} </p>

</div><br><br>
<label style="color:green;font-size:150%;">Pictures</label><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                 <div style="border:solid 1px blue;background-color:lightgreen;">
                    <img style="width:80%;height:20%;margin:5px" 
                    src="{{asset('Images/'.$pic)}}" alt="No picture"><br>
                 </div>
            </div>
    
    
            <div class="col-sm-6">
                 <div style="border:solid 1px blue;background-color:lightgreen;">
                    <img style="width:80%;height:20%;margin:5px" 
                    src="{{asset('Images/'.$pic)}}" alt="No picture"><br>
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                 <div style="border:solid 1px blue;background-color:lightgreen;">
                    <img style="width:80%;height:20%;margin:5px" 
                    src="{{asset('Images/'.$pic)}}" alt="No picture"><br>
                 </div>
            </div>
    
    
            <div class="col-sm-6">
                 <div style="border:solid 1px blue;background-color:lightgreen;">
                    <img style="width:80%;height:20%;margin:5px" 
                    src="{{asset('Images/'.$pic)}}" alt="No picture"><br>
                 </div>
            </div>
        </div>

    

@endsection