<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Http\Requests\AreaRequest;
use DataTables;

class AreaController extends Controller
{
    //
    public function index(Request $request)
    {
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
        
        if ($request->ajax()) {
            $data = Area::latest()->get();
            return Datatables::of($data)
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

    public function create() {
        return view('areas.create');
    }
    public function store(AreaRequest $request) {
        $areas=Area::create($request->all());
        return redirect()->route('areas.index');
    }
    public function show($id) {
        $areas=Area::findOrFail($id);
        return view('areas.show', compact('users'));
    }


    public function edit(string $id) {
        $areas=Area::findOrFail($id);
        return view('areas.edit', compact('areas'));
    }

    public function update(AreaRequest $request, $id) {
        $areaUpdate = Area::findOrFail($id);
        $areaUpdate->update($request->all());
        $areaUpdate->fresh();
        return redirect()->route('areas.index');
    }
    public function destroy($id) {
        $areas=Area::find($id)->delete();
        return redirect()->route('areas.index');
    }

}
