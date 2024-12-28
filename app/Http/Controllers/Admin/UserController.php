<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function getData(){
        $data = User::with('role')->get();
        $role = Roles::all();
        return view('admin.views.userManage')->with(['data' => $data, 'role' => $role]);
    }

    function insert(){
        
    }

    function create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role_id' => 'required',
            'password' => 'required|min:6',
        ]);

        $input = $request->only('name', 'email', 'role_id');

        $input['password'] = Hash::make($request->password);

        $insert = User::create($input);

        if (!$insert) {
            return redirect()->route('admin.user')->with('message');
        }
        return redirect()->route('admin.user')->with('message');
    }

    function detail(Request $request, $id){
        $data = User::find($id);
        $role = Roles::all();
        return view('admin.views.userDetail')->with(['data' => $data, 'role' => $role]);
    }

    function update(Request $request, $id){

        $data = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:6',
            ]);

            $input['password'] = Hash::make($request->password);
        }

        $input = $request->only('name', 'email', 'role_id');

        $update = $data->update($input);

        if (!$update) {
            return redirect()->route('admin.user')->with('message');
        }
        return redirect()->route('admin.user')->with('message');
    }

    function delete(Request $request, $id){
        $data = User::find($id);

        $delete = $data->delete();

        if (!$delete) {
            return redirect()->route('admin.user')->with('message');
        }
        return redirect()->route('admin.user')->with('message');
    }
}
