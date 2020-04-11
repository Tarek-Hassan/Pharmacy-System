<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables ; 
// use Illuminate\Http\Requests\PharmacyResquest;
use App\Pharmacy;
use App\Area;



class PharmacyController extends Controller
{

    public function index(Request $request)
    {
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
        
        if ($request->ajax()) {
            $data = Pharmacy::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                        $button = '&nbsp;&nbsp;&nbsp;<a href="pharmacies/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete">Delete</a>';
            return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('pharmacies.index');
    }

    function create () {
        $areas=Area::all();
        return view('pharmacies.create',[
            'areas' => $areas,
        ]);
        }   
            
    function store () {
        $request = request();
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img');
            $imageName = time() . '.' . $imagePath ->getClientOriginalExtension();
            // $imagePath->move($imageName);
            Storage::disk('public')->put('image/'.$imageName, File::get($imagePath));
           
            $request->img=$imageName;
              
         }
        
        Pharmacy::create([
            'pharmacy_name' => $request->pharmacy_name,
            'password' => Hash::make($request->password),
            'email' =>  $request->email,
            'priority'=>  $request->priority,
            // 'address_id'=>$request->address_id,
            'national_id'=>$request->national_id,
            'img'=> $request->img,
            'area_id'=>$request->area_id
            // Storage::disk('local')->put('file.txt', 'Contents')
           
            
        ]);
     
        session()->flash('success','Pharmacy created successfully');
        return redirect()->route('pharmacies.index');
        ;}         

public function show()
{
    $request = request();
    $pharmacy_id = $request->pharmacy;
    $pharmacy= Pharmacy::find($pharmacy_id);
    return view('pharmacies.show',[
        'pharmacy' => $pharmacy,
    ]);

  }

public function edit()
{ 
  $request=request();
 $pharmacy_id=$request->pharmacy;
 $pharmacy= Pharmacy::find($pharmacy_id); 
return view('pharmacies.edit',[
'pharmacy'=>$pharmacy
]);
 }


public function update()
{
  $request=request();
  $pharmacy_id=$request->pharmacy;
 $pharmacy= Pharmacy::find($pharmacy_id); 
  $pharmacy->update($request->all());
   return redirect('/pharmacies');
}

public function destroy()
   { 
    $request=request();
    $pharmacy_id=$request->pharmacy;
    $pharmacy= Pharmacy::find($pharmacy_id); 
    $pharmacy->delete();
    return redirect('/pharmacies');
   
    }


}
