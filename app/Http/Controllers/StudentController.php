<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Kelas;
use App\Models\Peringkat;
use App\Models\Penilaian;

class StudentController extends Controller
{
    public function getprofile($id)
    {
        $getprofile = Student::find($id);
        return response()->json(['message' => 'this your profile', 'data' => $getprofile, $getprofile->penilaian, $getprofile->peringkat, $getprofile->kelas->name]);
    }

    public function getUser()
    {
        $getprofile = Student::all();
        return response()->json(['message' => 'success', 'data' => $getprofile]);
    }

    public function register(Request $request)
    {
        $image = $request->file('image')->store('post-images');
        $data = new Student;
        $data->name = $request->name;
        $data->image = $image;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->kelas_id = $request->kelas_id;
        $data->peringkat_id = $request->peringkat_id;
        $data->penilaian_id = $request->penilaian_id;
        $data->utang_id = $request->utang_id;
        $data->role_id = $request->role_id;

        $data->save();

        return response()->json(['status' => 'success', 'message',  "Hallo {$data->name} terimakasih sudah mendaftar", 'data' => "ini data kamu ya $data "]);
    }

    public function getKelas()
    {
        $kelas = Kelas::all();
        return response()->json(['status' => 'success', 'message' => $kelas, 'students' => $kelas->student]);
    }

    public function inputKelas(Request $request)
    {
        $data = new Kelas();
        $data->kelas = $request->kelas;
        $data->student_Id = $request->student_Id;
        $data->save();
        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function peringkatadd(Request $request)
    {
        $data = new Peringkat;
        $data->nilai = $request->nilai;
        $data->student_Id = $request->student_Id;
        $data->save();
        return response()->json(['message' => 'success', 'data pemberi nilai' => $data]);
    }

    public function peringkatStudent()
    {
        $data = Peringkat::all();
        return response()->json(['message' => 'success', 'data nilai' => $data, $data->peringkats->student]);
    }

    public function addnilai(Request $request)
    {
        $data = new Penilaian;
        $data->nilai = $request->nilai;
        $data->student_Id = $request->student_Id;
        $data->save();
        return response()->json(['message' => 'success', 'data' => $data]);
    }


    //join 5 tablke
    // public function joinTable()
    // {
    //     $data = DB::table('students')
    //         ->leftJoin('kelas', 'students.id', "=", 'students.kelas_id')
    //         ->leftJoin('peringkats', 'students.id', "=", 'students.peringkat_id')
    //         ->leftJoin('penilaians', 'students.id', "=", 'setudents.penilaian_id')
    //         ->leftJoin('utangs', 'students.id', "=", 'students.utang_id')
    //         ->get();
    //     dd($data);
    // return view('home', $data);
    // return response()->json(['message' => 'success', 'data' =>$data, 'kelas'=>$data->kelas]);
    // }
}