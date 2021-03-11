<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //
    //
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
