<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->insert([
            'name' 				=> 	'Candle Admin',
            'email' 			=> 	'admin@candle.media',
            'phone' 			=> 	'08024916061',
            'email_verified_at' => 	Carbon::now(),
            'password' 			=> 	bcrypt('Admin@123'),
            'created_at'		=>	Carbon::now(),
            'updated_at'		=>	Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' 				=> 	'Akinshola Samuel',
            'email' 			=> 	'akinsholasamuel@gmail.com',
            'phone' 			=> 	'08024916061',
            'email_verified_at' => 	Carbon::now(),
            'password' 			=> 	bcrypt('Admin@123'),
            'created_at'		=>	Carbon::now(),
            'updated_at'		=>	Carbon::now()
        ]);

    }
}
