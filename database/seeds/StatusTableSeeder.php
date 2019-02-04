<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('status')->insert([
            'name' 			=> 'Active',
            'description' 	=> 'Active Action for items',
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

        DB::table('status')->insert([
            'name' 			=> 'Inactive',
            'description' 	=> 'Inactive actions for items',
            'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now()
        ]);

        DB::table('status')->insert([
            'name'          => 'Blacklists',
            'description'   => 'Blacklists actions for items',
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ]);

        DB::table('status')->insert([
            'name'          => 'Blocked',
            'description'   => 'Blocked actions for items',
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ]);

    }
}
