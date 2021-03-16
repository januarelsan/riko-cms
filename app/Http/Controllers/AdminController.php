<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    //
    
    public function editForm($id){        
        if(Auth::user()->id != $id)
            return redirect()->route('index');

        $user = User::find($id);        
        return view('admin-edit', compact('user'));
    }

    public function editStore(Request $request){        
        
        
        

        $user = User::find($request->id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('index')->with('message');
    }

    public function list(){
        $admins = User::all();        
        return view('admin-list', compact('admins'));                
    }

    public function activate($id){
        $admin = User::find($id);             
        $admin->activated = 1;
        $admin->save();           
        return redirect()->route('admin.list');
    }

    public function revoke($id){
        $admin = User::find($id);             
        $admin->activated = 0;
        $admin->save();           
        return redirect()->route('admin.list');
    }

    
}
