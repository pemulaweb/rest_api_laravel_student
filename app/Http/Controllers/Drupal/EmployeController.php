<?php

namespace App\Http\Controllers\Drupal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    public function getEmploye(){
        $data = DB::table('employee')->get();
        return view('welcome', ['data'=>$data]);
    }
    public function deleteEmploye($id){
        $data = DB::table('employee')->where('id', $id)->delete();
        return response()->json(['success']);
    }
}
