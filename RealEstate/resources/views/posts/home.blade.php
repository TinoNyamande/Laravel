@extends('layouts.head')
@section('content')<br><br>
<div style="margin-bottom:1px" class="container">
    {{$posts->links()}}
    
</div>

<div class="container">
    <div class="row row-eq-height" >
         @foreach($posts as $post)
         <div class="col-sm-4 post-container "  >
            <div class="post-div" >
              <img style="width:80%;height:60%;margin:5px" src="{{asset('/Images/'.$post->fileName)}}">
                  <div style="padding:5px">
                      <small class="sm">Posted by: {{$post->companyName}}</small><br>
                      <small class="sm">Location : {{$post->location}}</small><br>
                      <small class="sm">Price :{{$post->price}}</small><br>
                    </div>
                    <form method="post" style="margin-bottom: 0px">
                    @csrf
                        <input type="text" value ="{{$post->id}}" name="id" hidden>
                        <a><button class="btn btn-primary" >See more </button> </a>
                    </form>          
            </div>     
        
        </div>
        @endforeach
        
    </div>   
</div >

<div style="margin-bottom:1px" class="container">
                
{{$posts->links()}}
    
</div>
@endsection
