<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required',
            'no_hp'=>'required',
        ]);

        $user = User::find($id);
        $user->update([
            'name'=>$request->name,
            'no_hp'=>$request->no_hp,
        ]);

        return redirect()->route('home');
    }

}
