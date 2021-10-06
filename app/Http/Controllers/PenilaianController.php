<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function penilaian(Request $request)
    {

        $data = new Penilaian;
        $data->pelajaran = $request->pelajaran;
        $data->absensi = $request->absensi;
        $data->kerapihan = $request->kerapihan;
        $data->student_Id = $request->student_Id;
        $success = $data->save();
        if ($success) {
            return response()->json(['message' => 'success', 'data' => $data]);
        } else {
            return response()->json(['message' => 'failed',]);
        }
    }
    //join two table
    public function getPenilaian()
    {
        $data = DB::table('penilaians')
            ->join('students', 'penilaians.id', "=", 'student_Id')
            ->get();
        return response()->json(['message' => 'success', 'data' => $data]);
    }
    
    public function GetPenilaianId($id)
    {
        $data = DB::table('penilaians')
            ->join('students', 'penilaians.id', "=", 'student_Id')
            ->where('penilaians.id', $id)
            ->get();
        return response()->json(['message' => 'success', 'data' => $data]);
    }
    public function getIdnilai($id){
        $data = Penilaian::find($id);
        return response()->json(['message' => 'success', 'data' => $data, 'student'=>$data->student]);
    }
}