<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    public function keranjangs(){
        return $this->hasMany(Food::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}