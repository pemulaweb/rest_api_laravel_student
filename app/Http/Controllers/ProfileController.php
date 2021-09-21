<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ProfileController extends Controller
{
    public function getprofile(){
        return response()->json(['message'=>'Student']);
    }
    public function register(Request $request){

       
        $validate = $request->validate([
            'name'=>'required',
            'gambar'=>'required|file|max:1024',
            'kelas'=>'required',
            'pringkat'=>'required'
        ]);
        $image = $request->file('image')->store('post-images');
        $data = new Student;
        $data->name = $request->name;
        $data->image = $request->image;
        $data->kelas = $request->kelas;
        $data->peringkat = $request->peringkat;
        // if($request->file('image')){
        //     $validate['gambar'] = $request->file('image')->store('post-images');
        // 
        $success = $data->save();
            return response()->json(array('success' => 'success', 'data' => $data));
    }
   
}