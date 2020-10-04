<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsertablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username'=>'quan',
            'password'=>bcrypt('1'),
            'name'=>'Trung Quan',
            'email'=>'quan@gmail.com',
            'phone'=>'0336445423',
            'level'=>'1'
        ]);

        DB::table('users')->insert([
            'username'=>'hung',
            'password'=>bcrypt('1'),
            'name'=>'Hung',
            'email'=>'hung@gmail.com',
            'phone'=>'0987576628',
        ]);
    }
}
