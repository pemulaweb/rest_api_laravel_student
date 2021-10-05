<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peringkat;
use App\Models\Student;
class PeringkatController extends Controller
{
    public function add(Request $request){
        $data = new Peringkat;
        $data->nilai = $request->nilai;
        $data->student_Id = $request->student_Id;
        $data->save();
        return response()->json(['message'=>'success', 'data'=>$data]);
    }

    public function uploadImage(Request $request){
        $request->file('image')->store('post-images');
        return response()->json(['message'=>'success image tersimpan']);
    }

    
}