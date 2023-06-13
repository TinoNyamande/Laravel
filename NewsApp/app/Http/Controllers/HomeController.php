<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index() {
        return view('welcome' , ['posts'=>$posts = DB::table('posts')->orderBy('id','desc')->cursorPaginate(12)]);
    }
    public function viewPost(Request $request,Posts $mypost) {
       $posts = DB::table('posts')
       ->where('id','=',$request->id)
        ->get();
        
        return view('myposts.viewFile',['mypost'=>$posts[0]]);
        
    }
    public function view(Request $request,Posts $post) {
        return view('myposts.viewFile',['mypost'=>$post]);
         
     }
    public function zimNews() {
        return view('myposts.ZimNews' , ['posts'=>$posts = DB::table('posts')
        ->where('category','=','Zimbabwe News')
        ->orderBy('id','desc')
        ->cursorPaginate(12)]);
    }
    public function intNews() {
        return view('myposts.IntNews' , ['posts'=>$posts = DB::table('posts')
        ->where('category','=','International News')
        ->orderBy('id','desc')
        ->cursorPaginate(12)]);
    }
    public function sportNews() {
        return view('myposts.SportNews' , ['posts'=>$posts = DB::table('posts')
        ->where('category','=','Sports News')
        ->orderBy('id','desc')->cursorPaginate(12)]);
    }
    public function lifestyle() {
        return view('myposts.Lifestyle' , ['posts'=>$posts = DB::table('posts')
        ->where('category','=','Lifestyle')
        ->orderBy('id','desc')->cursorPaginate(12)]);
    }
}
