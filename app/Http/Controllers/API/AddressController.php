<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use App\Http\Resources\AddressResource;


class AddressController extends Controller
{
    //
    public function index(){
        return AddressResource::collection(Address::all());
    }

    public function show($address){
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
