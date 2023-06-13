<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function createform() {
        return view('posts.createPost');
    }
    public function store(Request $request) {
        
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'C:\Users\hp i5\Documents\HCS\Laravel\NewsApp\public',
        ]);

        $email = Auth::user()->email ;
        $writer = DB::table('users')->where('email','=',$email)->value('name');

        $fileName = time().$request->file->getClientOriginalName();
        $filepath = $disk->putFileAs('Images',$request->file('file',$fileName),$fileName);
        $title= $request->input('title');
        $email = Auth::user()->email ;
        $category= $request->input('category');
        $details= $request->input('details');
       DB::insert('insert into posts (title,email,category,image,image_path,writer,details)
        values(?,?,?,?,?,?,?)'
       ,[$title,$email,$category,$fileName,$filepath,$writer,$details]);

       return back()->with('success','Post saved');
    }

    public function viewPosts() {
        $posts = DB::table('posts')->get();
        return view('welcome' ,['posts'=>$posts]);
    }
    public function viewPostsMade() {
        $email = Auth::user()->email ;
        $name = DB::table('users')->where('email','=',$email)->value('name');
        $posts = DB::table('posts')->get()->where('writer' , '=',$name);
        return view('posts.viewPosts',['posts'=>$posts,'name'=>$name,'email'=>$email]);
    }
}
