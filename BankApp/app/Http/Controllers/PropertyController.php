<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index() {
        $email = Auth::user()->email;
        $posts = DB::table('users')->where('email','=',$email)->get();
        $post=$posts[0];
        return Inertia::render('myposts/index',['post'=>$post]);
    
    }
    public function balance() {
        $email = Auth::user()->email;
        $posts = DB::table('users')->where('email','=',$email)->get();
        $post=$posts[0];
        $bal = $post->balance;
        if ($bal == null) {
            $bal = "0.00";
        }
        return Inertia::render('myposts/checkbalance',['bal'=>$bal]);
    
    }
    public function makePayment() {
        return Inertia::render('myposts/makepayment');
    }
    public function pay(Request $request) {
        DB::transaction(function () use($request) {
        $accountNumber = Auth::user()->id;
        $amount = $request->amount;
        $receiverarray = DB::table('users')->where('id','=',$request->recepient)->get();
        if (sizeof($receiverarray)!=0 && $receiverarray[0]->id !=$accountNumber) {
            $availableAmount = DB::table('users')->where('id','=',$accountNumber)->get();
            $bal = $availableAmount[0]->balance;
            if ($amount > $bal) {
                return "Insufficient funds";
            } else {
                
                    
                  

                //taking money from account
                DB::table('users')
                ->where('id' ,'=' ,$accountNumber)
                ->update(['balance' =>$bal-$amount]);
               
                //adding amount to receiver
                $rc = DB::table('users')->where('id','=',$request->recepient)->get();
                $rbal = $rc[0]->balance;   

                DB::table('users')
                ->where('id' ,'=' ,$request->recepient)
                ->update(['balance' =>$rbal+$amount]);
               //updating trasnactions table
             

            $payment = Transactions::create([
                'type' =>"receipt",
                'amount' => $amount,
                'accountNumber' => $request->recepient,
                'description' =>$request->description,
            ]);

            $receipt = Transactions::create([
                'type' =>"payment",
                'amount' => $amount,
                'accountNumber' => $accountNumber,
                'description' =>$request->description,
            ]);
        

                return redirect()->route('myposts.index')->with('success','Trascation successfull');
            }
        }
        else {
            return "Not found";
        }
    });
    }
    
    public function stat() {
        $id = Auth::user()->id;
        $stats = DB::table('transactions')->where('accountNumber','=',$id)->get();
        $cbal = Auth::user()->balance;
        return Inertia::render('myposts/statement',['stats'=>$stats,'bal'=>$cbal]);
    }
        
    
    public function create() {
        return Inertia::render('myposts/create');
    }
    public function store(Request $request) {
        
        /**$email = Auth::user()->email;
        $cname = Auth::user()->name;
        
        
        $type= $request->type;
        $price= $request->price;
        $phone= $request->phone;
        $location= $request->location;
        $description= $request->description; **/
        $disk = Storage::build([
            'driver' => 'local',
            'root' => 'C:\Users\hp i5\Documents\HCS\Laravel\RealEstate\public',
        ]);
        if ($request->hasFile('file')){

        
          return "File Selected";
       // $fileName = time().$request->file;
        //$filePath = $disk->putFileAs('Images',$request->file('file',$fileName),$fileName);
        //return $fileName;
        }
        else {
            return "No file selected".$request->file;
        }

        
    
      //   if ($request->file1 != null){
        //$fileName1 = time().$request->file1->getClientOriginalName();
       // $filePath1 = $disk->putFileAs('Images',$request->file('file1',$fileName1),$fileName1);
       // }
       // else {
         //   $fileName1 = null;
        //}

        //if ($request->file2 != null){
         //   $fileName2 = time().$request->file2->getClientOriginalName();
         //   $filePath2 = $disk->putFileAs('Images',$request->file('file2',$fileName2),$fileName2);
         //   } else {
         //       $fileName2 = null;
         //   }
         //   if ($request->file3 != null){
         //       $fileName3 = time().$request->file3->getClientOriginalName();
         //       $filePath3 = $disk->putFileAs('Images',$request->file('file3',$fileName3),$fileName3);
          //      } else {
          //          $fileName3 = null;
          //      }

       // DB::insert('insert into properties
       //  (type,location,price,email,description,mobile,companyName,fileName,fileName1,fileName2,fileName3)
       // values(?,?,?,?,?,?,?,?,?,?,?)',
       //  [$type,$location,$price,$email,$description,$phone,$cname,$fileName,$fileName1,$fileName2,$fileName3]);

        // return redirect('/myposts')->with('success','Details Saved');  */

    }
    public function edit(Posts $mypost) {
        //
    }
    public function update(Request $request) {
       //
    
    }
    public function destroy() {
       //
    }
}
