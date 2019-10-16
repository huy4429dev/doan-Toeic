<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class StudentsTableSeeder extends Seeder
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
                'name'       => 'member',
                'email'      => 'member@gmail.com',
                'password'   => bcrypt('123456'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
         
    
         
        ];

        foreach ($users as $user) {
            DB::table('students')->insert($user);
        }
    }
}
