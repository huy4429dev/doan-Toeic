<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id'    => 1,
                'name'       => 'admin',
                'email'      => 'admin@gmail.com',
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
         
            [
                'role_id'    => 2,
                'name'       => 'user',
                'email'      => 'user@gmail.com',
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
         
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
