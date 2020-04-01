<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
        
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $button  = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="users/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edite</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm "  data-toggle="modal"data-target="#delete">Delete</a>';
            return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('users.index');
    }

    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {
        return view('users.index');
    }
    public function show($id) {
        $users=User::findOrFail($id);
        return view('users.show', compact('users'));
    }


    public function edit(string $id) {
        $users=User::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id) {
        return redirect()->route('users.index');
    }
    public function destroy($id) {
        $users=User::findOrFail($id);
        $users->delete();
        return redirect()->back('users.index');
    }

}
