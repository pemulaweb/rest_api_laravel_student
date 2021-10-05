<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    
        public function student()
        {
            return $this->hasMany(Comment::class, 'student_Id', 'id');
        }
    
}