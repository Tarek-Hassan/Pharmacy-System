<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use App\Http\Resources\AddressResource;
use App\User;

class AddressController extends Controller
{
    //
    public function index(){
        return AddressResource::collection(Address::all());
    }

    public function show($address){
        // $user_address=Address::find($address);
        // $user_id=User::find($user_address);

        // if ($user_id != auth()->user()->id){
        //     return "you are not autherized";
        // }
        return new AddressResource(Address::find($address));
    }

    public function store(Request $request){
        return Address::create($request->all());
    }

    public function update(Request $request, $address){
        return Address::find($address)->update($request->all());  
    }

    public function destroy($address){
        Address::find($address)->delete();
        return response()->json(null, 204);//204 action executed successfully but no content to return
    }
}
