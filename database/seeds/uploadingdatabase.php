<?php

use Illuminate\Database\Seeder;

class uploadingdatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
         public function run () {
            DB::table('users')->insert([
            ['name'=>'Bao', 'email'=>'duynguyenbao2002@gmail.com', 'password'=>Hash::make(12345678)],
            ['name'=>'Joshua', 'email'=>'joshua@gmail.com', 'password'=>Hash::make(12345678)],
            ['name'=>'Huyn', 'email'=>'huyn@gmail.com', 'password'=>Hash::make(12345678)],
            ['name'=>'Mohammad', 'email'=>'Mohammad@gmail.com', 'password'=>Hash::make(12345678)]
            ]);
        }
    
}
