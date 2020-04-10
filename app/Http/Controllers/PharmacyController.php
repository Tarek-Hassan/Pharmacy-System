<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Http\Requests\AreaRequest;
use Yajra\DataTables\DataTables ;

class PharmacyController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth:pharmacy');
    // }
 
    //
    public function index(Request $request)
    {
        dd("PharmacyControllerPage");
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
        
        if ($request->ajax()) {
            $data = Area::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                        $button = '&nbsp;&nbsp;&nbsp;<a href="areas/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edite</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
            return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('areas.index');
    }

}