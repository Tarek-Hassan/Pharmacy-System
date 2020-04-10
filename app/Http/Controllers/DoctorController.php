<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Pharmacy;
use App\Http\Requests\DoctorRequest;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{

       //
       public function index(Request $request)
       {
           // 1-change the model name
           //  2-change the href of the edit to be (modelName/$row->id/edit)
           
           if ($request->ajax()) {
               $data = Doctor::latest()->get();
               return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', function($row){
                           // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                           $button = '&nbsp;&nbsp;&nbsp;<a href="doctors/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edit</a>';
                           $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
               return $button;
                       })
                       ->rawColumns(['action'])
                       ->make(true);
           }
         
           return view('doctors.index');
       }
   
       public function create() {
        $pharmacies = Pharmacy::all();
           return view('doctors.create',[
            'pharmacies' => $pharmacies,
           ]);
       }
       public function store(DoctorRequest $request ) {
            $request['password']=Hash::make($request->password);
            if($request->hasfile('img'))
            {
                $file = $request->file('img');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                Storage::disk('public')->put('images/'.$filename, File::get($file));
            }
            $request->img=$filename;
            // else{
            //     $filename = 'doctor.jpeg';
            // }
            // $request['img']=Storage::disk('public')->put(public_path('images'),$request['img']);
            // dd($request['img']);
         

        //    $doctors=
           Doctor::create([
            'national_id'=>$request->national_id,
            'doctor_name'=>$request->doctor_name,
            'img'=>$request->img,
            'password'=>$request->password,
            'email'=>$request->email,
            'pharmacy_id'=>$request->pharmacy_id,
           ]);
           return redirect()->route('doctors.index');
       }
       public function show($id) {
           $doctors=Doctor::findOrFail($id);
           return view('doctors.show', compact('doctors'));
       }
   
   
       public function edit($id) {
         $pharmacies = Pharmacy::all();
           $doctors=Doctor::findOrFail($id);
           return view('doctors.edit', compact('doctors','pharmacies'));
       }
   
       public function update(DoctorRequest $request, $id ) {
        //    if(array_key_exists('img',$model)){
        //        Storage::disk('public')->delete($model['oldimg']);
        //        $model['img']=Storage::disk('public')->put($this->path,$model['img']);
        //        dd($model);
        //     }
           $doctorUpdate = Doctor::findOrFail($id);
           $doctorUpdate->update($request->all());
           $doctorUpdate->fresh();
           return redirect()->route('doctors.index');
       }
       public function destroy($id) {
           $doctors=Doctor::find($id)->delete();
           return redirect()->route('doctors.index');
       }
}
