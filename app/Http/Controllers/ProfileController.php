<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    use App\Models\Student;

    class ProfileController extends Controller
    {
        public function getprofile($id)
        {
            $profile = Student::find($id);
            return response()->json(['message' => 'this your profile', 'data' => $profile, 'kelas'=>$profile->kelas->kelas , 'nilai'=>$profile->peringkat->nilai]);
        }
        public function getUser(){
            $getprofile = Student::All();
            return response()->json(['message' => 'success', 'data' => $getprofile, ]);
        }
        public function register(Request $request)
        {
            $image = $request->file('image')->store('post-images');
            $data = new Student;
            $data->name = $request->name;
            $data->image = $image;
            $data->kelas = $request->kelas;
            $data->peringkat = $request->peringkat;
            $data->save();
            return response()->json(['status' => 'success', 'message' => "Hallo {$data->name} terimakasih sudah mendaftar", 'data' => "ini data kamu ya $data  "]);
        }

       
        
    }
