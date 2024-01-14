<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'no_hp'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'no_hp'=>$request->no_hp,
        ]);

        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'role'=>'required',
        ]);

        $user = User::find($id);
        $user->update([
            'role'=>$request->role,
        ]);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.index', compact('user'));
    }
}
