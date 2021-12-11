<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
                'name' => "admin",
                'email' => 'admin@admin.com',
                'password' => bcrypt('karachi123'),
                'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
        	)
        ));

        // DB::table('users')->insert(array(
        // 	array(
        //         'name' => "rahban",
        //         'email' => 'rahban@gmail.com',
        //         'status' => '1',
        //         'password' => bcrypt('karachi123'),
        //         'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s')
        // 	)
        // ));
    }
}
