<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Doctor;
use App\Pharmacy;
use App\Http\Requests\OrderRequest;
use App\Medicine;
use App\MedicineOrder;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    

       //
       public function index(Request $request)
       {
           // 1-change the model name
           //  2-change the href of the edit to be (modelName/$row->id/edit)
           
           if ($request->ajax()) {
               $data = Order::latest()->get();
               return DataTables::of($data)
                       ->addIndexColumn()
                    //    ->addColumn('pharmacy_id', function($row){return $row->pharmacy->pharmacy_name;}) 
                    //    ->addColumn('doctor_id', function($row){return $row->doctor->name;}) 
                       ->addColumn('action', function($row){
                           $button = '&nbsp;&nbsp;&nbsp;<a href="orders/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edit</a>';
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
           $medicines = Medicine::all();
           $users = User::all();
           return view('orders.create',[
               'pharmacies' => $pharmacies,
               'doctors' => $doctors,
               'medicines' => $medicines,
               'users' => $users,

           ]);
       }
       public function store(OrderRequest $request) {
      
           $orders=Order::create($request->all());
           $request['order_id']=$orders->id;
            
            $medicine = Medicine::find($request->medicine_id);
        $total=$medicine->price*$request->quantity;
           $ord=MedicineOrder::create([
            'medicine_id' => $request->medicine_id,
            'order_id' => $request->order_id,
            'user_id' => $request->user_id,
            'pharmacy_id' => $request->pharmacy_id,
            'quantity' => $request->quantity,
            'total_price' => $total,
           ]);
           
           //Notify Route this put in OrderController To NOtifiyPrice
           $user = \App\User::find($request->user_id);
           $orderno=$orders->id;
           $price=$total;
           $details = [
                   'body'=>"Cost Of OrderNO. : $orderno  is $price $"
           ];
           $user->notify(new \App\Notifications\PriceNotification($details));
           return redirect()->route('orders.index');
       }
       public function show($id) {
           $orders=Order::findOrFail($id);
           return view('orders.show', compact('orders'));
       }
   
   
       public function edit(string $id) {
        $pharmacies=Pharmacy::all();
        $doctors=Doctor::all();
        $medicines=Medicine::all();
        $users=User::all();
        $medicineorder=MedicineOrder::where('order_id',$id)->first();
        $orders=Order::findOrFail($id);
           return view('orders.edit', compact('orders','medicineorder','doctors','pharmacies','medicines','users'));
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
