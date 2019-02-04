<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class NetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('at_networks')->insert([
            'name' 			=> 	'Airtel NG',
            'description' 	=> 	'Airtel Nigeria',
            'code'          =>  '126',
            'code_char'     =>  '*126*pin_code#',
            'is_active' 	=> 	boolval(true),
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

        DB::table('at_networks')->insert([
            'name' 			=> 	'MTN NG',
            'description' 	=> 	'MTN Nigeria',
            'code'          =>  '555',
            'code_char'     =>  '*555*pin_code#',
            'is_active' 	=> 	boolval(true),
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

        DB::table('at_networks')->insert([
            'name' 			=> 	'GLO NG',
            'description' 	=> 	'GLOBACOM Nigeria',
            'code'          =>  '123',
            'code_char'     =>  '*123*pin_code#',
            'is_active' 	=> 	boolval(true),
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

        DB::table('at_networks')->insert([
            'name' 			=> 	'9mobile NG',
            'description' 	=> 	'9mobile Nigeria',
            'code'          =>  '126',
            'code_char'     =>  '*222*pin_code#',
            'is_active' 	=> 	boolval(true),
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

        DB::table('at_networks')->insert([
            'name' 			=> 	'NTEL NG',
            'description' 	=> 	'NTEL Nigeria',
            'code'          =>  '020',
            'code_char'     =>  '*020*pin_code#',
            'is_active' 	=> 	boolval(true),
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

    }
}
