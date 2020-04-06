<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Doctor;
use App\Pharmacy;
use App\Medicine;
use App\Http\Requests\OrderRequest;
use DataTables;

class MedicineOrderController extends Controller
{
    
       //
       public function index(Request $request)
       {
           // 1-change the model name
           //  2-change the href of the edit to be (modelName/$row->id/edit)
           
           if ($request->ajax()) {
               $data = Order::latest()->get();
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', function($row){
                           // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                           $button = '&nbsp;&nbsp;&nbsp;<a href="orders/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edite</a>';
                           $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
               return $button;
                       })
                       ->rawColumns(['action'])
                       ->make(true);
           }
         
           return view('orders.index');
       }
   
       public function create() {
           $pharmacies = Pharmacy::all();
           $doctors = Doctor::all();
        //    dd($doctors);
           return view('orders.create',[
               'doctors' => $doctors,
               'pharmacies' => $pharmacies,
           ]);
       }
       public function store(Request $request) {
        //    dd($request->all());
        //    $orders=Order::create($request->all());
            Order::create([
                'delivery_address' => $request->delivery_address,
                'is_insured' => $request->is_insured,
                'status' => $request->status,
                'creator_type' => $request->creator_type,
                'pharmacy_id' => $request->pharmacy_id,
                'doctor_id' => $request->doctor_id,
            ]);
           return redirect()->route('orders.index');
       }
       public function show($id) {
           $orders=Order::findOrFail($id);
           return view('orders.show', compact('orders'));
       }
   
   
       public function edit(string $id) {
           $orders=Order::findOrFail($id);
           return view('orders.edit', compact('orders'));
       }
   
       public function update(OrderRequest $request, $id) {
           $OrderUpdate = Order::findOrFail($id);
           $OrderUpdate->update($request->all());
           $OrderUpdate->fresh();
           return redirect()->route('orders.index');
       }
       public function destroy($id) {
           $orders=Order::find($id)->delete();
           return redirect()->route('orders.index');
       }
}




