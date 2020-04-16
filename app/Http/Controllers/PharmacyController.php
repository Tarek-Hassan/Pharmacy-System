<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables ; 
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
             
    public function store(Request $request) {
        $request['img']=Storage::disk('public')->put('images',$request->profile);
        $request['password']=Hash::make($request->password);
        $pharmacy=Pharmacy::create($request->all());
        return redirect()->route('pharmacies.index');

      
    }     

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


public function update(Request $request, $id)
{
    if($request->profile){
        Storage::disk('public')->delete($request->oldimg);
        $request['img']=Storage::disk('public')->put('images',$request->profile);
    }else{
        $request['img']=$request->oldimg;
    }
 $pharmacy= Pharmacy::findOrFail($id); 
  $pharmacy->update($request->all());
  $pharmacy->fresh();
   return redirect('/pharmacies');
}

public function destroy($id)
   { 
   
    $pharmacy= Pharmacy::find($id); 
    Storage::disk('public')->delete($pharmacy->img);
    $pharmacy->delete();
    return redirect()->back();
   
    }


}
