<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Http\Controllers\Controller;
use App\Order;
use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PrescriptionController extends Controller
{
    //

    public function store(Request $request){
        //validate img
        $this->validate($request,[
            'img' =>'required',
            'img.*'=> 'image|mimes:jpeg,jpg'
        ]);
        
        //check for image existance and loop to get each image of the array
        if($request->hasfile('img')){

            foreach($request->file('img') as $image){
                
                $extention=$image->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                // Storage::disk('public')->put('prescription/'.$filename, File::get($image));
                $image->move('prescription/',$filename);
                $data[]=$filename;//store each img in the array
        
            }
           
            $request->img=$data;

            $address=Address::find($request->delivery_address_id);
            
            if($address->user_id != $request->user_id){//check for address
                $error["message"] = "Delivery address is NOT valid";
                return response()->json(["error"=>$error], 201);
            }
            $presc= new Prescription();
            $presc->img=json_encode($data);
            $presc->is_insured=$request->is_insured;
            $presc->user_id=$request->user_id;
            $presc->delivery_address_id=$request->delivery_address_id;
            $presc->save();
            // $presc=Prescription::create($request->all());
            return response()->json($presc, 200);
        }
        

    }


    public function update(Request $request, $id){
        dd($request->all());
        $address=Prescription::find($id);
        // dd($address->delivery_address_id);
        $order=Order::find($address->delivery_address_id);
        // dd(hello)
        dd($order->status);
        
        if($order->status != "new"){
            return "sorry you cant update it now";
        }
        
        $image=$request->file('img');
        dd($image);
        if($image !=''){
            $this->validate($request,[
                'img' =>'required',
                'img.*'=> 'image|mimes:jpeg,jpg'
            ]);
            $extention=$image->getClientOriginalExtension();
            $image_name=time().'.'.$extention;
            $image->move('presc_updates/',$image_name);
            $img[]=$image_name;
        }
        $request->img=$img;
        $data=array(
            'img'=>$request->img,
            'is_insured'=>$request->is_insured
        );
        Prescription::whereId($id)->update($data);
        return "success";
    }
}
