<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use UserRequest;
class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // 1-change the model name
        //  2-change the href of the edit to be (modelName/$row->id/edit)
 
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="users/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm">Edite</a>';
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
        $request['password']=Hash::make($request->password);
        if($request->hasfile('profile_pic'))
        {
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Storage::disk('public')->put('images/'.$filename, File::get($file));
        }
        $request['profile_pic']=$filename;
        $user=User::create($request->all());
        return redirect()->route('users.index');
        // return view('users.index');
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
        $userUpdate = User::findOrFail($id);
        $userUpdate->update($request->all());
        $userUpdate->fresh();
        return redirect()->route('users.index');
    }
    public function destroy($id) {
        $users=User::find($id)->delete();
        return redirect()->back();
    }

}
