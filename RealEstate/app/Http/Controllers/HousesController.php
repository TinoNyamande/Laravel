<?php

namespace App\Http\Controllers;
use App\Models\House;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    public function index() {
        $myposts = DB::table('houses')->get()
        ->where('email', Auth::user()->email);
        //return $myposts;
        return view('posts.index' , ['myposts'=>$myposts]);
    }
    public function create() {
        return view ('posts.create');
    }
    public function store(Request $request) {
        $email = Auth::user()->email;
        $cname = Auth::user()->name;
        $phone = Auth::user()->phone;

        $validated = $request->validate([
            'type' => 'required',
            'price' => 'bail|required|regex:/^[$]{1}[0-9]{1,20}/',
            'location' => 'bail|required',
            'description' => 'bail|required',
             'file' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             'file1' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             'file2' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             'file3' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
        ]);
        
        $type= $validated['type'];
        $price= $validated['price'];
        $location= $validated['location'];
        $description= $validated['description'];
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'C:\Users\hp i5\Documents\HCS\Laravel\RealEstate\public',
        ]);

        $fileName = time().$request->file->getClientOriginalName();
        $filePath = $disk->putFileAs('Images',$request->file('file',$fileName),$fileName);

        if ($request->file1 != null){
        $fileName1 = time().$request->file1->getClientOriginalName();
        $filePath1 = $disk->putFileAs('Images',$request->file('file1',$fileName1),$fileName1);
        }
        else {
            $fileName1 = null;
        }

        if ($request->file2 != null){
            $fileName2 = time().$request->file2->getClientOriginalName();
            $filePath2 = $disk->putFileAs('Images',$request->file('file2',$fileName2),$fileName2);
            } else {
                $fileName2 = null;
            }
            if ($request->file3 != null){
                $fileName3 = time().$request->file3->getClientOriginalName();
                $filePath3 = $disk->putFileAs('Images',$request->file('file3',$fileName3),$fileName3);
                } else {
                    $fileName3 = null;
                }

        DB::insert('insert into houses
         (type,location,price,description,email,mobile,companyName,fileName,fileName1,fileName2,fileName3)
        values(?,?,?,?,?,?,?,?,?,?,?)',
         [$type,$location,$price,$description,$email,$phone,$cname,$fileName,$fileName1,$fileName2,$fileName3]);

        return redirect()->route('dashboard')->with('success','Data  saved');
    }
    public function show(House $house) {
          return redirect()->route('posts.show');
    }
    public function edit(House $house) {
        return view('posts.edit',compact('house'));
    }
    public function update(Request $request,House $house) {
        $email = Auth::user()->email;
        $cname = Auth::user()->name;
        $phone = Auth::user()->phone;

        $validated = $request->validate([
            'type' => 'required',
            'price' => 'bail|required|regex:/^[$]{1}[0-9]{1,20}/',
            'location' => 'bail|required',
            'description' => 'bail|required',
             'file' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             'file1' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             'file2' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
             'file3' => 'bail|min:2|max:5000|mimes:jpg,jpeg,png',
        ]);
        
        $type= $validated['type'];
        $price= $validated['price'];
        $location= $validated['location'];
        $description= $validated['description'];
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'C:\Users\hp i5\Documents\HCS\Laravel\RealEstate\public',
        ]);

        $fileName = time().$request->file->getClientOriginalName();
        $filePath = $disk->putFileAs('Images',$request->file('file',$fileName),$fileName);

        if ($request->file1 != null){
        $fileName1 = time().$request->file1->getClientOriginalName();
        $filePath1 = $disk->putFileAs('Images',$request->file('file1',$fileName1),$fileName1);
        }
        else {
            $fileName1 = null;
        }

        if ($request->file2 != null){
            $fileName2 = time().$request->file2->getClientOriginalName();
            $filePath2 = $disk->putFileAs('Images',$request->file('file2',$fileName2),$fileName2);
            } else {
                $fileName2 = null;
            }
            if ($request->file3 != null){
                $fileName3 = time().$request->file3->getClientOriginalName();
                $filePath3 = $disk->putFileAs('Images',$request->file('file3',$fileName3),$fileName3);
                } else {
                    $fileName3 = null;
                }
                DB::update("update houses set type='$type' location = '$location'
                price = '$price' description = '$description' email = '$email'
                mobile = '$mobile' companyName = '$companyName' 
                fileName = '$fileName' fileName1 = '$fileName1' 
                fileName2 = '$fileName2' fileName3 = '$fileName3' 
                ,email,mobile,companyName,fileName,fileName1,fileName2,fileName3
                 where id = '$house' ");
    
        return redirect()->route('posts.index')->with('success','Updated successfully');
    }
    public function destroy(House $house) {
       
         //$post = House::find($house);
       $house->delete();
    return redirect()->route('dashboard')->with('success','Updated successfully');
    }
}
