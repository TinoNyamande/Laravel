@extends('layouts.loginhead')
@section('content')
@if ($message = Session::get('success'))
<div style="background-color:white"> 
    <h1 style="color:blue">{{$message}}</h1>
</div><br><br>
@endif

@if(count($errors)>0)
<div style="color:red;">
    @foreach($errors->all() as $error)
    <h1>{{$error}}</h1>
    @endforeach
</div><br><br>
@endif

<form  method="post" class="container form-control my-form" enctype="multipart/form-data">
    @csrf
    <input type="text" value="{{$house->name}}" name="id" hidden>
    <h2>Change Pictures</h2><br>
    <div class="mt-4" style="border:solid 1px blue;background-color:aliceblue;width:80%;padding:5%">
    <img style="width:40%;height:200px;margin:5px" src="{{asset('Images/'.$house->fileName)}}" alt="No picture"><br>
    <label>Uploaded picture</label><br><br>
    <label>Choose another picture</label><br><br>
    <input type="file" name="file"><br>
    </div>
    
    
    <div class="mt-4" style="border:solid 1px blue;background-color:aliceblue;width:80%;padding:5%">
    <img style="width:40%;height:200px;margin:5px" src="{{asset('Images/'.$house->fileName1)}}" alt="No picture"><br>
    <label>Uploaded picture</label><br><br>
    <label>Choose another picture</label><br>
    <input type="file" name="file"><br>
    </div>

    <div class="mt-4" style="border:solid 1px blue;background-color:aliceblue;width:80%;padding:5%">
    <img style="width:40%;height:200px;margin:5px" src="{{asset('Images/'.$house->fileName2)}}" alt="No picture"><br>
    <label>Uploaded picture</label><br><br>
    <label>Choose another picture</label><br>
    <input type="file" name="file"><br>
    </div>
    <div class="mt-4" style="border:solid 1px blue;background-color:aliceblue;width:80%;padding:5%">
    <img style="width:40%;height:200px;margin:5px" src="{{asset('/Images/'.$house->fileName3)}}" alt="No picture"><br>
    <label>Uploaded picture</label><br><br>
    <label>Choose another picture</label><br>
    <input type="file" name="file"><br>
    </div><br><br>

    <label>Type</label><br>
    <select name="type" style="width: 100%;padding:1%;border-radius:6px;border:1px solid gainsboro;">
        <option value="For Sale" >For Sale </option>
        <option value="For Rent">For Rent </option>
    </select><br><br>

    <div class="mt-4">
    <label for="price">Price</label><br>
    <input class="block mt-1 w-full form-control" type="text" value="{{$house->price}}" name="price" id="price" required>
    </div>
    
    <div class="mt-4">
    <label>Location</label><br>
    <input class="block mt-1 w-full form-control" type="text"  value="{{$house->location}}" name="location" id="location" required>
    </div>
    
    <div class="mt-4">
    <label>Description</label><br>
    <input class="block mt-1 w-full form-control"l" type="text"  value="{{$house->description}}" name="description" id="description" required>
    </div>

    <div class="mt-4">
    <a ><button class="btn btn-primary form-control" >Save changes</button> </a><br>
    
    </div>
    
</form>




@endsection