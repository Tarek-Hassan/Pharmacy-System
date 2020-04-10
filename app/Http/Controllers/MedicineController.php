<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\Http\Requests\MedicineRequest;
use DataTables;

class MedicineController extends Controller
{
    

       //
       public function index(Request $request)
       {
           // 1-change the model name
           //  2-change the href of the edit to be (modelName/$row->id/edit)
           
           if ($request->ajax()) {
               $data = Medicine::latest()->get();
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', function($row){
                           // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                           $button = '&nbsp;&nbsp;&nbsp;<a href="medicines/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edit</a>';
                           $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
               return $button;
                       })
                       ->rawColumns(['action'])
                       ->make(true);
           }
         
           return view('medicines.index');
       }
   
       public function create() {
           return view('medicines.create');
       }
       public function store(Request $request) {
        //    dd($request->all());
            
           $medicines=Medicine::create($request->all());

           return redirect()->route('medicines.index');
       }
       public function show($id) {
           $medicines=Medicine::findOrFail($id);
           return view('medicines.show', compact('medicines'));
       }
   
   
       public function edit(string $id) {
           $medicines=Medicine::findOrFail($id);
           return view('medicines.edit', compact('medicines'));
       }
   
       public function update(MedicineRequest $request, $id) {
           $MedicineUpdate = Medicine::findOrFail($id);
           $MedicineUpdate->update($request->all());
           $MedicineUpdate->fresh();
           return redirect()->route('medicines.index');
       }
       public function destroy($id) {
           $medicines=Medicine::find($id)->delete();
           return redirect()->route('medicines.index');
       }
}


