<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UtangMail;

class SendMailController extends Controller
{
    public function sendmailutang(){
        $bayar = [
          'title' => 'Email Dari Kantin.com',
          'body' => 'Hi kunyuk utang mu udah lunas ya'
        ];
        try{
            \Mail::to('freelancerw9@gmail.com')->send(new UtangMail($bayar));
            echo "Email berhasil dikirim.";
        }
        catch(\Exception $e) {
            echo "Email gagal dikirim karena $e.";
        }
    }
}