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
    <fieldset style="font: bolder">
        <legend>Enter property details</legend>
    <div class="mt-4">
    <label>Upload Pictures</label><br>
    <input type="file" name="file" required><br><br>

    
    <input type="file" name="file1"><br><br>

    <input type="file" name="file2"><br><br>

    <input type="file" name="file3"><br><br>
    </div>

    <div class="mt-4">
    <label>Type</label><br>
    <select name="type" style="width: 100%;padding:1%;border-radius:6px;border:1px solid gainsboro;">
        <option value="For Sale" >For Sale </option>
        <option value="For Rent">For Rent </option>
    </select>
    </div>

    <div class="mt-4">
    <label>Price</label><br>
    <input class="block mt-1 w-full form-control" type="text" value="{{old('price')}}" name="price" id="price" required>
    </div>
    <div class="mt-4">
    <label for ="description">Description</label><br>
    <input class="block mt-1 w-full form-control" type="text" value="{{old('description')}}" name="description" id="description" required>
    </div>
    <div class="mt-4">
    <label>Location</label><br>
    <input class="block mt-1 w-full form-control" type="location"  value="{{old('location')}}" name="location" id="location" required>
    </div>
    <div class="mt-4">
    <a href= "{{route('dashboard.store')}}" ><button class="btn btn-primary form-control" >Save </button> </a>
    </div>
    </fieldset>
</form>

@endsection