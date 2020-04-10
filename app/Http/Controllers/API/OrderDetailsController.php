<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicineResource;
use App\Http\Resources\OrderDetailsResource;
use App\Medicine;
use App\MedicineOrder;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    //
    public function index(){
        //first response
        return OrderDetailsResource::collection(MedicineOrder::all());



        //second response
        // $order=OrderDetailsResource::collection(MedicineOrder::all());
        // $medicine=MedicineResource::collection(Medicine::all());
        // return response()->json([
        //     'order'=>$order,
        //     'medicine'=>$medicine
        // ]);
    }
}
