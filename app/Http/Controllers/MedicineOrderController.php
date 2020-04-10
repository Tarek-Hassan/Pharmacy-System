<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MedicineOrder;
use App\Order;
use App\Doctor;
use App\Pharmacy;
use App\Medicine;
use App\User;
use App\Http\Requests\MedicineOrderRequest;
use DataTables;

class MedicineOrderController extends Controller
{
    
       //
       public function index(Request $request)
       {
           // 1-change the model name
           //  2-change the href of the edit to be (modelName/$row->id/edit)
           
           if ($request->ajax()) {
               $data = MedicineOrder::latest()->get();
               return Datatables::of($data)
                       ->addIndexColumn()
                    //    ->addColumn('medicine_id', function($row){
                    //     return $row->medicine;
                    //    })
                       ->addColumn('action', function($row){

                           // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                           $button = '&nbsp;&nbsp;&nbsp;<a href="medicineorders/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edit</a>';
                           $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
               return $button;
                       })
                       ->rawColumns(['action'])
                       ->make(true);

           }
         
           return view('medicineorders.index');
       }
   
       public function create() {
            $medicines = Medicine::all();
            $orders = Order::all();
            $users = User::all();
            $pharmacies = Pharmacy::all();
            
           
           
           
        //    dd($doctors);
           return view('medicineorders.create',[
            'medicines' => $medicines,
            'orders' => $orders,
            'users' => $users,
            'pharmacies' => $pharmacies,
            
               
           ]);
       }
       public function store(Request $request) {
            // dd($request->all());
        //    $orders=Order::create($request->all());
        
        MedicineOrder::create([
                'medicine_id' => $request->medicine_id,
                'order_id' => $request->order_id,
                'user_id' => $request->user_id,
                'pharmacy_id' => $request->pharmacy_id,
                'quantity' => $request->quantity,
                'total_price' => $request->total_price
            ]);
           return redirect()->route('medicineorders.index');
       }
       public function show($id) {
           $orders=MedicineOrder::findOrFail($id);
           return view('medicineorders.show', compact('medicineorders'));
       }
   
   
       public function edit(string $id) {
           $orders=MedicineOrder::findOrFail($id);
           return view('medicineorders.edit', compact('medicineorders'));
       }
   
       public function update(MedicineOrderRequest $request, $id) {
           $OrderUpdate = MedicineOrder::findOrFail($id);
           $OrderUpdate->update($request->all());
           $OrderUpdate->fresh();
           return redirect()->route('medicineorders.index');
       }
       public function destroy($id) {
           $orders=MedicineOrder::find($id)->delete();
           return redirect()->route('medicineorders.index');
       }
}




