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

    // public function listView(){
    //     $menus = Menu::all();                
    //     return view('menu', compact('menus'));        
    // }
    
    // public function showById($id){
    //     //Tampilkan Menu berdasarkan id
    //     $menu = Menu::findOrFail($id);
    //     return $menu;
    // }

    // public function showByName($name){
    //     //Tampilkan Menu berdasarkan name
    //     $menus = Menu::where('name' , '=', $name)->get();
    //     return $menus;
    // }

    // public function showByPrice($price){
    //     //Tampilkan Menu berdasarkan id
    //     $menus = Menu::where('price' , '=', $price)->get();
    //     return $menus;
    // }

    // public function store(Request $request)
    // {
        

    //     $menu = Menu::create([
    //         'name' => 'Bebek',
    //         'price' => 7000,
    //     ]);

    //     // $menu->save();
    // }

    // public function update(Request $request){
    //     //Membuat Menu        
    // }

    // public function delete($id){
    //     //Membuat Menu
    // }
}
