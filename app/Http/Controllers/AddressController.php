<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Area;
use App\Http\Requests\AddressRequest;
use Yajra\DataTables\DataTables ;

class AddressController extends Controller
{
    //
    public function index(Request $request)
    {
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
        
        if ($request->ajax()) {
            $data = Address::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('main', function($row){ return $row->is_main==1 ? 'Main' :'NoT Main';})
                    ->addColumn('username', function($row){ return $row->user->name;})
                    ->addColumn('areaname', function($row){ return $row->area->name;})
                    ->addColumn('action', function($row){
                        // $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                        $button = '&nbsp;&nbsp;&nbsp;<a href="address/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edite</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
            return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('address.index');
    }

    public function create() {
        
        $areas=Area::all();
        return view('address.create',compact('areas'));
    }
    public function store(AddressRequest $request) {
        $address=Address::create($request->all());
        return redirect()->route('address.index');
    }
    public function edit(string $id) {
        $areas=Area::all();
        $address=Address::findOrFail($id);
        return view('address.edit', compact('address','areas'));
    }

    public function update(AddressRequest $request, $id) {
        $addressUpdate = Address::findOrFail($id);
        $addressUpdate->update($request->all());
        $addressUpdate->fresh();
        return redirect()->route('address.index');
    }
    public function destroy($id) {
        $address=Address::find($id)->delete();
        return redirect()->route('address.index');
    }
}
