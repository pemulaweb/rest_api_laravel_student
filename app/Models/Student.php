<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Model
{
      use HasApiTokens, HasFactory, Notifiable;
      
      protected $guarded = [
      'id'
      ];

      public function kelas()
      {
            return $this->hasOne(Kelas::class);
      }
      public function peringkat()
      {
            return $this->belongsTo(Peringkat::class);
      }
      public function penilaian()
      {
            return $this->belongsTo(Penilaian::class);
      }
}