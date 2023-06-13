<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;

class PostsController extends Controller
{
    public function show() {
        return view('posts.home' , ['posts'=>$posts = DB::table('houses')->orderBy('price')->cursorPaginate(12)]);
    }
    public function sale() {
        return view('posts.home' , ['posts'=>DB::table('houses')->where('type','For Sale')->orderBy('type')->cursorPaginate(12)]);
    }
    public function rent() {
        return view('posts.home' , ['posts'=>DB::table('houses')->where('type','For Rent')->orderBy('type')->cursorPaginate(12)]);
    }
   
}