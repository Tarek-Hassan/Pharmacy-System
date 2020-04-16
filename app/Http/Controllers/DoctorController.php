<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Pharmacy;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Cog\Laravel\Ban\Traits\Bannable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class DoctorController extends Controller
{

       //
       public function index(Request $request)
       {
           // 1-change the model name
           //  2-change the href of the edit to be (modelName/$row->id/edit)
           
           if ($request->ajax()) {
               $data = Doctor::latest()->get();
               return DataTables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', function($row){
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

  
       public function store(Request $request) {
        $request['docImage']=Storage::disk('public')->put('images',$request->profile);
        $request['password']=Hash::make($request->password);
        $doctor=Doctor::create($request->all());
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
        if($request->profile){
            Storage::disk('public')->delete($request->oldimg);
            $request['docImage']=Storage::disk('public')->put('images',$request->profile);
        }else{
            $request['docImage']=$request->oldimg;
        }

           $doctorUpdate = Doctor::findOrFail($id);
           $doctorUpdate->update($request->all());
           $doctorUpdate->fresh();
           return redirect()->route('doctors.index');
       }

       public function destroy($id) {
           $doctors=Doctor::find($id);
           Storage::disk('public')->delete($doctors->docImage);
           $doctors->delete();
           return redirect()->route('doctors.index');
       }

    //    public function ban($id) {
    //     $doctors=Doctor::find($id);
    //     if($doctors->isBanned()){
    //         $doctors->unban();
    //     }
    //     else{
    //         $doctors->ban();
    //     }
    //     return redirect()->route('doctors.index');
    // }

    //    public function ban(){
    //     $doctorId = request()->doctor;
    //     $doctor =Doctor::find($doctorId);
    //     dd($doctor);
    //     if($doctor->isNotBanned()){
    //     $doctor->ban();
    //     // Doctor::where('id',$doctorId)->update([
    //     // 'is_banned'=>true,
        
    //     // ]);
    // }
    //     else {
    //     $doctor->unban();
    //     // Doctor::where('id',$doctorId)->update([
    //     // 'is_banned'=>false,
    //     // ]);
    // }
    //     return redirect()->route('doctors.index');
    //     } 
}
