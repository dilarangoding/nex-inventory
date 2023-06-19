<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at','DESC')->get();
        return view('users.index',compact('users'));
    }

    public function store(Request $req){
        $validate = $req->validate([
            'role'     => 'required',
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required',
        ]);

        try {

            $user = User::create([
                'role'      => $req->role,
                'name'      => $req->name,
                'email'     => $req->email,
                'password'  => bcrypt($req->password),
            ]);

            return back()->with('success','Data berhasil ditambah');
        } catch (\Throwable $th) {
            return back()->with('error',$th->geMessage());
        }
    }

    public function edit($id){
        $user = User::find($id);

        return view('users.edit',compact('user'));
    }

    public function update(Request $req, $id){
        $validate = $req->validate([
            'role'     => 'required',
            'name'     => 'required',
            'email'    => 'required|unique:users,email,'.$id,
            'password' => 'nullable',
        ]);

        try {
            $user = User::find($id);
            $pw   = !empty($req->password) ? bcrypt($req->password) : $user->password;
            $user->update([
                'role'      => $req->role,
                'name'      => $req->name,
                'email'     => $req->email,
                'password'  => $pw,
            ]);

            return redirect('user')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('errro',$th->getMessage());
        }
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
