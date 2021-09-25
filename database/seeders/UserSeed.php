<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('students')->insert([
         'name' => Str::random(10),
         'image' => Str::random(10),
         ]);
    }
}


