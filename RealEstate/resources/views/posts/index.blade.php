@extends('layouts.loginhead')
@section('content')
@if ($message = Session::get('success'))
<div style="background-color:white"> 
    <h1 style="color:blue">{{$message}}</h1>
</div><br><br>
@endif
<table class="table">
  <tr>
    <th>Category</th>
    <th>Location</th>
    <th>Price</th>
    <th>Id</th>
    <th>Actions</th>
  </tr>
  @foreach($myposts as $mypost)
  <tr>
    <td>{{$mypost->type}} </td>
    <td>{{$mypost->location}} </td>
    <td>{{$mypost->price}} </td>
    <td>{{$mypost->id}} </td>
    <td>
       
<form method="Post" action="{{route('posts.destroy',$mypost->id)}}">
    @csrf
       <a href="{{route('posts.edit',$mypost->id)}}" class="btn btn-primary" >Edit  </a>
       @method('DELETE')
       <a href="{{route('posts.destroy',$mypost->id)}}"  class="btn btn-danger" >Delete</a>
</form>
    </td>

  </tr>
  @endforeach
</table>


@endsection