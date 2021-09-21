<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peringkat;
class PeringkatController extends Controller
{
    public function add(Request $request){
        $data = new Peringkat;
        $data->nilai = $request->nilai;

        $data->save();
        return response()->json(['message'=>'success']);
    }
}