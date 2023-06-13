<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class NewsController extends Controller
{
    public function index() {
        $email = Auth::user()->email;
        $posts = Posts::orderBy('id','desc')->where('email','=',$email)->paginate(10);
        return view('myposts.index',compact('posts'));
    }
    public function create() {
        return view('myposts.create');
    }
    public function store(Request $request) {
        $email = Auth::user()->email;
        $name = Auth::user()->name;

        $validated = $request->validate([
            'title' => 'required',
            'body' => 'bail|required|',
            'category' => 'bail|required',
             'file' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             
        ]);
        $title= $validated['title'];
        $body= $validated['body'];
        $category= $validated['category'];
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'C:\Users\hp i5\Documents\HCS\Laravel\NewsApp\public',
        ]);

        $fileName = time().$request->file->getClientOriginalName();
        $filePath = $disk->putFileAs('Images',$request->file('file',$fileName),$fileName);


     

        DB::insert('insert into posts
         (title,email,category,image,writer,details)
        values(?,?,?,?,?,?)',
         [$title,$email,$category,$fileName,$name,$body]);

        return redirect()->route('myposts.index');
    }
    public function edit(Posts $mypost) {
        return view('myposts.edit' , compact('mypost'));
    }
    public function update(Request $request,Posts $mypost) {
        $validated = $request->validate([
        'title' => 'required',
        'body' => 'bail|required|',
        'category' => 'bail|required',
         'file' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
         
    ]);
    $title= $validated['title'];
    $body= $validated['body'];
    $category= $validated['category'];
    $disk = Storage::build([
        'driver' => 'local',
        'root' => 'C:\Users\hp i5\Documents\HCS\Laravel\NewsApp\public',
    ]);
    $fileName = time().$request->file->getClientOriginalName();
    $filePath = $disk->putFileAs('Images',$request->file('file',$fileName),$fileName);
        

        
        DB::table('posts')
        ->where('id' ,'=' ,$mypost->id)
        ->update(['title' =>$title,'details'=>$body,'category'=>$category,'image'=>$fileName]);
        return redirect()->route('myposts.index')->with('success','Updated successfully');
    
    }
    public function destroy(Posts $mypost) {
        $mypost->delete();
        return redirect()->route('myposts.index')->with('success','Post deleted ');
    }
}
